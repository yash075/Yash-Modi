package com.ey.ecare.dao;

import com.ey.ecare.bean.*;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;

public class Reporter {
    public static ArrayList<LeaveBean> getLeaveBean(){
        ArrayList<LeaveBean> list = new ArrayList<>();
        try(Connection cn = Administrator.getCn()){
            String sql = "SELECT ocs_tbl_leave.*,ocs_tbl_doctor.* FROM ocs_tbl_leave " +
                    "INNER JOIN ocs_tbl_doctor ON ocs_tbl_doctor.doctor_id=ocs_tbl_leave.doctor_id";
            try(PreparedStatement ps = cn.prepareStatement(sql)){
                try(ResultSet rs = ps.executeQuery()){
                    while(rs.next()){
                        list.add(new LeaveBean(rs.getInt("ocs_tbl_leave.leave_id"),
                                rs.getInt("ocs_tbl_leave.doctor_id"),
                                new DoctorBean(rs.getInt("ocs_tbl_doctor.doctor_id"),
                                        rs.getString("ocs_tbl_doctor.doctor_name"),
                                        rs.getString("ocs_tbl_doctor.specialization")),
                                rs.getDate("ocs_tbl_leave.leave_From"),
                                rs.getDate("ocs_tbl_leave.leave_To"),
                                rs.getString("ocs_tbl_leave.reason"),
                                rs.getInt("ocs_tbl_leave.status")));
                    }
                }
            }
        }
        catch(Exception ex){
            System.out.println("ERROR in gets Leave Bean Method" + ex);
        }
        return list;
    }
    public static boolean changePassword(CredentialsBean cb){
        try(Connection cn = Administrator.getCn()){

            String sql = "update ocs_tbl_user_credentials set password=? Where userid=?;";
            try (PreparedStatement ps = cn.prepareStatement(sql)) {
                ps.setString(1,cb.getPassword());
                ps.setString(2,cb.getUserId());
                ps.executeUpdate();
                return true;
            }
        }
        catch (Exception ex){
            System.out.println("ERROR in Change Password Method" + ex);
        }
        return false;
    }
}
