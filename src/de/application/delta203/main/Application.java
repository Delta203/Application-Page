package de.application.delta203.main;

import java.util.Random;

import org.bukkit.Bukkit;
import org.bukkit.command.Command;
import org.bukkit.command.CommandSender;
import org.bukkit.entity.Player;
import org.bukkit.event.EventHandler;
import org.bukkit.event.Listener;
import org.bukkit.event.player.PlayerJoinEvent;
import org.bukkit.plugin.java.JavaPlugin;

import de.application.delta203.main.mysql.Login_GetMySQl;
import de.application.delta203.main.mysql.Login_MySQl;

public class Application extends JavaPlugin implements Listener {

    public static Application plugin;
    public static String prefix;
    public static String[] mysqldata;

    @Override
    public void onEnable() {
        plugin = this;
        getConfig().options().copyDefaults(true);
        saveConfig();

        prefix = getConfig().getString("prefix").replace('&', '§');
        mysqldata = new String[5];
        mysqldata[0] = getConfig().getString("mysql_host");
        mysqldata[1] = getConfig().getString("mysql_port");
        mysqldata[2] = getConfig().getString("mysql_database");
        mysqldata[3] = getConfig().getString("mysql_user");
        mysqldata[4] = getConfig().getString("mysql_password");

        registerMySQl();

        Bukkit.getPluginManager().registerEvents(this, this);
        Bukkit.broadcastMessage(prefix + "§aPlugin erfolgreich geladen.");
    }

    private void registerMySQl() {
        try {
            Login_MySQl.connect();
            Login_MySQl.createTable();
        }catch(Exception ex) {

        }

        Bukkit.getScheduler().scheduleSyncRepeatingTask(plugin, new Runnable() {
            @Override
            public void run() {
                if(!Login_MySQl.isConnected() || Login_MySQl.con == null) {
                    try {
                        Login_MySQl.disconnect();
                    }catch (Exception ex) {
                    }

                    try {
                        Login_MySQl.connect();
                        Login_MySQl.createTable();
                    }catch(Exception ex) {

                    }
                }
            }
        }, 0, 20);
    }

    @Override
    public boolean onCommand(CommandSender sender, Command cmd, String label, String[] args) {
        if(cmd.getName().equalsIgnoreCase("logindatas")) {
            if(sender instanceof Player) {
                Player p = (Player) sender;
                p.sendMessage(prefix + "§7Benutzername: §e" + p.getName() + " §7Passwort: §e" + Login_GetMySQl.getPassword(p.getUniqueId().toString()));
            }
        }else if(cmd.getName().equalsIgnoreCase("setapplycationmoderator")) {
            if(sender instanceof Player) {
                Player p = (Player) sender;
                if(p.isOp()) {
                	if(args.length == 1) {
                		Player t = Bukkit.getPlayer(args[0]);
                		if(t != null) {
                			if(Login_GetMySQl.getModerator(t.getUniqueId().toString())) {
                				Login_GetMySQl.setModerator(t.getUniqueId().toString(), 0);
                				p.sendMessage(prefix + "§e" + t.getName() + " §cist nun kein Bewerbungs-Moderator.");
                			}else {
                				Login_GetMySQl.setModerator(t.getUniqueId().toString(), 1);
                				p.sendMessage(prefix + "§e" + t.getName() + " §aist nun ein Bewerbungs-Moderator.");
                			}
                		}else {
                			p.sendMessage(prefix + "§cDer Spieler ist nicht online.");
                		}
                	}else {
                		p.sendMessage(prefix + "§c/setapplycationmoderator <Spieler>");
                	}
                }
            }
        }
        return false;
    }

    @EventHandler
    public void onJoin(PlayerJoinEvent e) {
        Player p = e.getPlayer();
        if(!Login_GetMySQl.isRegistered(p.getUniqueId().toString())) {
            String alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            String fullalphabet = alphabet + alphabet.toLowerCase() + "123456789";
            Random rdm = new Random();
            String password = String.valueOf(fullalphabet.charAt(rdm.nextInt(fullalphabet.length()))) + String.valueOf(fullalphabet.charAt(rdm.nextInt(fullalphabet.length()))) +
                    String.valueOf(fullalphabet.charAt(rdm.nextInt(fullalphabet.length()))) + String.valueOf(fullalphabet.charAt(rdm.nextInt(fullalphabet.length()))) +
                    String.valueOf(fullalphabet.charAt(rdm.nextInt(fullalphabet.length())));
            Login_GetMySQl.setLoginDatas(p.getUniqueId().toString(), p.getName(), password, 0, 0);
            p.sendMessage(prefix + "§7Benutzername: §e" + p.getName() + " §7Passwort: §e" + password);
        }
    }
}
