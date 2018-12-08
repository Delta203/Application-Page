package de.application.delta203.main.mysql;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

import de.application.delta203.main.Application;

public class Login_MySQl {

    public static Connection con;

    public static void connect() {
        if (!isConnected()) {
            try {
                con = DriverManager.getConnection("jdbc:mysql://" + Application.mysqldata[0] + ":" + Application.mysqldata[1] + "/" + Application.mysqldata[2] + "?autoRecconect=true", Application.mysqldata[3], Application.mysqldata[4]);
                System.out.println(Application.prefix + "LoginDatas MySQl has been connected.");
            } catch (SQLException ex) {
                System.out.println(Application.prefix + "LoginDatas MySQl has can not connect.");

            }
        }
    }

    public static void disconnect() {
        if (isConnected()) {
            try {
                con.close();
                System.out.println("MySQl connection canceled.");
            } catch (SQLException e) {
                e.printStackTrace();
            }
        }
    }

    public static boolean isConnected() {
        return con != null;
    }

    public static void createTable() {
        try {
            con.prepareStatement("CREATE TABLE IF NOT EXISTS LoginDatas (SpielerUUID VARCHAR(100), SpielerNAME VARCHAR(100),Passwort VARCHAR(100),Beworben INT(2),Moderator INT(2))").executeUpdate();
            System.out.println(Application.prefix + "LoginDatas MySQl table has been registered.");
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}
