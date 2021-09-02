package com.ey.ecare.dao;

import com.ey.ecare.bean.*;

import java.util.ArrayList;
import java.util.Date;
import java.sql.*;


public class Administrator {
    public static Connection getCn() throws Exception{
        return DriverManager.getConnection("jdbc:mysql://localhost:3306/SmileClinic?useUnicode=true&useJDBCCompliantTimeShift=true&useLegacyDatetimeCode=false&serverTimezone=UTC","root","");
    }

    public static boolean login(CredentialsBean cb){
        try(Connection cn = Administrator.getCn()){

            String sql = "update ocs_tbl_user_credentials set login_status=? Where userid=?;";
            try (PreparedStatement ps = cn.prepareStatement(sql)) {
                ps.setInt(1,0);
                ps.setString(2,cb.getUserId());
                ps.executeUpdate();
                return true;
            }
        }
        catch (Exception ex){
            System.out.println("ERROR in login status Method" + ex);
        }
        return false;
    }

    public static boolean logout(CredentialsBean cb){
        try(Connection cn = Administrator.getCn()){

            String sql = "update ocs_tbl_user_credentials set login_status=? Where userid=?;";
            try (PreparedStatement ps = cn.prepareStatement(sql)) {
                ps.setInt(1,1);
                ps.setString(2,cb.getUserId());
                ps.executeUpdate();
                return true;
            }
        }
        catch (Exception ex){
            System.out.println("ERROR in logout status Method" + ex);
        }
        return false;
    }

    public static boolean insertCredentials(CredentialsBean cb){
        if(Administrator.checkCredentialsUserId(cb)) {
            System.out.println("\nUser id already Exist ");
            return false;
        }
        try(Connection cn = Administrator.getCn()){
            String sql = "insert into ocs_tbl_user_credentials values(?,?,?,?);";
            try (PreparedStatement ps = cn.prepareStatement(sql)) {
                ps.setString(1,cb.getUserId());
                ps.setString(2,cb.getPassword());
                ps.setString(3,cb.getUserType());
                ps.setInt(4,1);
                ps.executeUpdate();
                return true;
            }
        }
        catch (Exception ex){
            System.out.println("ERROR in insert Credentials Method" + ex);
        }
        return false;
    }

    public static boolean checkCredentialsUserId(CredentialsBean cb){
        try(Connection cn = Administrator.getCn()) {
            String sql = "select * from ocs_tbl_user_credentials where userid = ?";
            try (PreparedStatement ps = cn.prepareStatement(sql)) {
                ps.setString(1, cb.getUserId());
                try (ResultSet rs = ps.executeQuery()) {
                    if (rs.next())
                        return true;
                }
            }
        }
        catch (Exception ex){
            System.out.println("ERROR in check Credentials User ID Method" + ex);
        }
        return false;
    }

    public static boolean checkCredentials(CredentialsBean cb){
        try(Connection cn = Administrator.getCn()) {
            String sql = "select * from ocs_tbl_user_credentials where userid=? AND" +
                    " password=? AND user_type=? ";
            try (PreparedStatement ps = cn.prepareStatement(sql)) {
                ps.setString(1, cb.getUserId());
                ps.setString(2, cb.getPassword());
                ps.setString(3, cb.getUserType());

                try (ResultSet rs = ps.executeQuery()) {
                    if (rs.next())
                        return true;
                }
            }
        }
        catch (Exception ex){
            System.out.println("ERROR in check Credentials Method" + ex);
        }
        return false;
    }

    public static boolean insertDoctor(DoctorBean doctorBean){
        if(Administrator.checkDoctorBean(doctorBean)) {
            System.out.println("\nDoctor already Exist. ");
            return false;
        }
        try(Connection cn = Administrator.getCn()){
            String sql = "insert into ocs_tbl_doctor(doctor_name,dob,doj,gender" +
                    ",qualification,specialization,yoe,street,location,city,state" +
                    ",pincode,contactno,email_id) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
            try (PreparedStatement ps = cn.prepareStatement(sql)) {
                ps.setString(1,doctorBean.getDoctorName());
                ps.setDate(2,new java.sql.Date(doctorBean.getDateOfBirth().getTime()));
                ps.setDate(3,new java.sql.Date(doctorBean.getDateOfJoining().getTime()));
                ps.setString(4,doctorBean.getGender());
                ps.setString(5,doctorBean.getQualification());
                ps.setString(6,doctorBean.getSpecialization());
                ps.setInt(7,doctorBean.getYearsOfExperience());
                ps.setString(8,doctorBean.getStreet());
                ps.setString(9,doctorBean.getLocation());
                ps.setString(10,doctorBean.getCity());
                ps.setString(11,doctorBean.getState());
                ps.setString(12,doctorBean.getPincode());
                ps.setString(13,doctorBean.getContactNumber());
                ps.setString(14,doctorBean.getEmailId());
                ps.executeUpdate();
                return true;
            }
        }
        catch (Exception ex){
            System.out.println("ERROR in insert Doctor Method" + ex);
        }
        return false;
    }

    public static boolean checkDoctorBean(DoctorBean doctorBean){
        try(Connection cn = Administrator.getCn()) {
            String sql = "select * from ocs_tbl_doctor where doctor_name=? OR (contactno=? AND email_id=?)";      /// Aaa baki 6e
            try (PreparedStatement ps = cn.prepareStatement(sql)) {
                ps.setString(1,doctorBean.getDoctorName());
                ps.setString(2,doctorBean.getContactNumber());
                ps.setString(3,doctorBean.getEmailId());
                try (ResultSet rs = ps.executeQuery()) {
                    if (rs.next())
                        return true;
                }
            }
        }
        catch (Exception ex){
            System.out.println("ERROR in check Doctor Method" + ex);
        }
        return false;
    }

    public static ArrayList<DoctorBean> getDoctorBean(){
        ArrayList<DoctorBean> list = new ArrayList<>();
        try(Connection cn = Administrator.getCn()){
            String sql = "select * from ocs_tbl_doctor";
            try(PreparedStatement ps = cn.prepareStatement(sql)){
                try(ResultSet rs = ps.executeQuery()){
                    while(rs.next()){
                        list.add(new DoctorBean(rs.getInt("doctor_id"),
                                rs.getString("doctor_name"),rs.getDate("dob"),
                                rs.getDate("doj"),rs.getString("gender"),
                                rs.getString("qualification"),rs.getString("specialization"),
                                rs.getInt("yoe"),rs.getString("street"),
                                rs.getString("location"),rs.getString("city"),
                                rs.getString("state"),rs.getString("pincode"),
                                rs.getString("contactno"),rs.getString("email_id")));
                    }
                }
            }
        }
        catch(Exception ex){
            System.out.println("ERROR in gets Doctor Bean Method" + ex);
        }
        return list;
    }

    public static boolean deleteDoctorBean(DoctorBean doctorBean){
        try(Connection cn = Administrator.getCn()){
            String sql = "delete from oct_tbl_doctor where doctor_id=?; ";
            try(PreparedStatement ps = cn.prepareStatement(sql)){
                ps.setInt(1,doctorBean.getDoctorId());
                ps.executeUpdate();
                return true;
            }
        }
        catch (Exception ex){
            System.out.println("ERROR in delete Doctor Bean Method" + ex);
        }
        return false;
    }

    public static boolean updateDoctor(DoctorBean doctorBean){
        try(Connection cn = Administrator.getCn()){
            String sql = "update ocs_tbl_doctor set doctor_name=?,dob=?,doj=?," +
                    "gender=?,qualification=?,specialization=?,yoe=?,street=?," +
                    "location=?,city=?,state=?,pincode=?,contactno=?,email_id=? " +
                    "WHERE doctor_id=?;";
            try (PreparedStatement ps = cn.prepareStatement(sql)) {
                ps.setString(1,doctorBean.getDoctorName());
                ps.setDate(2,new java.sql.Date(doctorBean.getDateOfBirth().getTime()));
                ps.setDate(3,new java.sql.Date(doctorBean.getDateOfJoining().getTime()));
                ps.setString(4,doctorBean.getGender());
                ps.setString(5,doctorBean.getQualification());
                ps.setString(6,doctorBean.getSpecialization());
                ps.setInt(7,doctorBean.getYearsOfExperience());
                ps.setString(8,doctorBean.getStreet());
                ps.setString(9,doctorBean.getLocation());
                ps.setString(10,doctorBean.getCity());
                ps.setString(11,doctorBean.getState());
                ps.setString(12,doctorBean.getPincode());
                ps.setString(13,doctorBean.getContactNumber());
                ps.setString(14,doctorBean.getEmailId());
                ps.setInt(15,doctorBean.getDoctorId());
                ps.executeUpdate();
                return true;
            }
        }
        catch (Exception ex){
            System.out.println("ERROR in update Doctor Method" + ex);
        }
        return false;
    }

    public static boolean insertProfile(ProfileBean profileBean, CredentialsBean credentialsBean){
        if(Administrator.checkProfileBean(profileBean)) {
            System.out.println("\nUser Id already Exist. ");
            return false;
        }
        try(Connection cn = Administrator.getCn()){
            String sql = "insert into ocs_tbl_user_profile values(?,?,?,?,?,?,?,?,?,?,?,?);";
            try (PreparedStatement ps = cn.prepareStatement(sql)) {
                ps.setString(1,profileBean.getUserId());
                ps.setString(2,profileBean.getFirstName());
                ps.setString(3,profileBean.getLastName());
                ps.setDate(4,new java.sql.Date(profileBean.getDateOfbirth().getTime()));
                ps.setString(5,profileBean.getGender());
                ps.setString(6,profileBean.getStreet());
                ps.setString(7,profileBean.getLocation());
                ps.setString(8,profileBean.getCity());
                ps.setString(9,profileBean.getState());
                ps.setString(10,profileBean.getPincode());
                ps.setString(11,profileBean.getMobileNo());
                ps.setString(12,profileBean.getEmailId());
                ps.executeUpdate();
                if(Administrator.insertCredentials(credentialsBean))
                    return true;
                else
                    return false;
            }
        }
        catch (Exception ex){
            System.out.println("ERROR in insert Profile Method" + ex);
        }
        return false;
    }

    public static boolean checkProfileBean(ProfileBean profileBean){
        try(Connection cn = Administrator.getCn()) {
            String sql = "select * from ocs_tbl_user_profile where user_id=?";
            try (PreparedStatement ps = cn.prepareStatement(sql)) {
                ps.setString(1,profileBean.getUserId());
                try (ResultSet rs = ps.executeQuery()) {
                    if (rs.next())
                        return true;
                }
            }
        }
        catch (Exception ex){
            System.out.println("ERROR in check User Profile Method" + ex);
        }
        return false;
    }

    public static boolean updateProfileBean(ProfileBean profileBean){
        try(Connection cn = Administrator.getCn()){
            String sql = "update ocs_tbl_user_profile set firstname=?,lastname=?,dob=?," +
                    "gender=?,street=?,location=?,city=?,state=?,pincode=?,mobileno=?," +
                    "email_id=? WHERE user_id=?;";
            try (PreparedStatement ps = cn.prepareStatement(sql)) {
                ps.setString(1,profileBean.getFirstName());
                ps.setString(2,profileBean.getLastName());
                ps.setDate(3,new java.sql.Date(profileBean.getDateOfbirth().getTime()));
                ps.setString(4,profileBean.getGender());
                ps.setString(5,profileBean.getStreet());
                ps.setString(6,profileBean.getLocation());
                ps.setString(7,profileBean.getCity());
                ps.setString(8,profileBean.getState());
                ps.setString(9,profileBean.getPincode());
                ps.setString(10,profileBean.getMobileNo());
                ps.setString(11,profileBean.getEmailId());
                ps.setString(12,profileBean.getUserId());
                ps.executeUpdate();
                return true;
            }
        }
        catch (Exception ex){
            System.out.println("ERROR in update Doctor Method" + ex);
        }
        return false;
    }

    public static ArrayList<ProfileBean> getProfileBean(){
        ArrayList<ProfileBean> list = new ArrayList<>();
        try(Connection cn = Administrator.getCn()){
            String sql = "select * from ocs_tbl_user_profile";
            try(PreparedStatement ps = cn.prepareStatement(sql)){
                try(ResultSet rs = ps.executeQuery()){
                    while(rs.next()){
                        list.add(new ProfileBean(rs.getString("user_id"),
                                rs.getString("firstname"),rs.getString("lastname"),
                                rs.getDate("dob"),rs.getString("gender"),
                                rs.getString("street"),rs.getString("location"),
                                rs.getString("location"),rs.getString("state"),
                                rs.getString("pincode"),rs.getString("mobileno"),
                                rs.getString("email_id")));
                    }
                }
            }
        }
        catch(Exception ex){
            System.out.println("ERROR in gets Profile Bean Method" + ex);
        }
        return list;
    }

    public static boolean deleteCredentialsBean(String userId){
        try(Connection cn = Administrator.getCn()){
            String sql = "delete from ocs_tbl_user_credentials where userid=?; ";
            try(PreparedStatement ps = cn.prepareStatement(sql)){
                ps.setString(1,userId);
                ps.executeUpdate();
                return true;
            }
        }
        catch (Exception ex){
            System.out.println("ERROR in delete Credential Bean Method" + ex);
        }
        return false;
    }

    public static boolean deleteProfileBean(ProfileBean profileBean){
        try(Connection cn = Administrator.getCn()){
            String sql = "delete from ocs_tbl_user_profile where user_id=?; ";
            try(PreparedStatement ps = cn.prepareStatement(sql)){
                ps.setString(1,profileBean.getUserId());
                ps.executeUpdate();
                if(Administrator.deleteCredentialsBean(profileBean.getUserId()))
                    return true;
                else
                    return false;
            }
        }
        catch (Exception ex){
            System.out.println("ERROR in delete User profile Bean Method" + ex);
        }
        return false;
    }
}
