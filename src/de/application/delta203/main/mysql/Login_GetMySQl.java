package de.application.delta203.main.mysql;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

public class Login_GetMySQl {

    // CREATE TABLE IF NOT EXISTS LoginDatas (SpielerUUID VARCHAR(100), SpielerNAME VARCHAR(100),Password VARCHAR(100))

    public static boolean isRegistered(String uuid) {
        if(getPassword(uuid) == null) {
            return false;
        }else {
            return true;
        }
    }

    public static String getPassword(String uuid) {
        try {
            PreparedStatement ps = Login_MySQl.con.prepareStatement("SELECT Passwort FROM LoginDatas WHERE SpielerUUID = ?");
            ps.setString(1, uuid);
            ResultSet rs = ps.executeQuery();
            if (rs.next()) {
                return rs.getString("Passwort");
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return null;
    }

    public static void setModerator(String uuid, int yesno) {
    	try {
			PreparedStatement ps = Login_MySQl.con.prepareStatement("UPDATE LoginDatas SET Moderator = ? WHERE SpielerUUID = ?");
			ps.setInt(1, yesno);
			ps.setString(2, uuid);
			ps.executeUpdate();
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}
    
    public static boolean getModerator(String uuid) {
        try {
            PreparedStatement ps = Login_MySQl.con.prepareStatement("SELECT Moderator FROM LoginDatas WHERE SpielerUUID = ?");
            ps.setString(1, uuid);
            ResultSet rs = ps.executeQuery();
            if (rs.next()) {
                if(rs.getInt("Moderator") == 1) {
                	return true;
                }else {
                	return false;
                }
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return false;
    }
    
    public static void setLoginDatas(String uuid, String name, String password, int beworben, int moderator) {
        try {
            PreparedStatement ps = Login_MySQl.con.prepareStatement("INSERT INTO LoginDatas (SpielerUUID,SpielerNAME,Passwort,Beworben,Moderator) VALUES (?,?,?,?,?)");
            ps.setString(1, uuid);
            ps.setString(2, name);
            ps.setString(3, password);
            ps.setInt(4, beworben);
            ps.setInt(5, moderator);
            ps.executeUpdate();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}
