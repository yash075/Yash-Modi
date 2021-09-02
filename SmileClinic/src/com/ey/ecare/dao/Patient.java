package com.ey.ecare.dao;

import com.ey.ecare.bean.*;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.ArrayList;

public class Patient {

    public static boolean insertPatientBean(PatientBean profileBean){
        if(Patient.checkPatientBean(profileBean)) {
            System.out.println("\nPatient Appointment already Exist. ");
            return false;
        }
        try(Connection cn = Administrator.getCn()){
            String sql = "insert into ocs_tbl_patient(user_id,apoointment_date,ailment_type,ailment_details,diagnosis_history) values(?,?,?,?,?);";
            try (PreparedStatement ps = cn.prepareStatement(sql)) {
                ps.setString(1,profileBean.getUserId());
                ps.setDate(2,new java.sql.Date(profileBean.getAppointmentDate().getTime()));
                ps.setString(3,profileBean.getAlimentType());
                ps.setString(4,profileBean.getAlimentDetails());
                ps.setString(5,profileBean.getDiagnosisHistory());
                ps.executeUpdate();
                return true;
            }
        }
        catch (Exception ex){
            System.out.println("ERROR in insert patient Method" + ex);
        }
        return false;
    }

    public static boolean checkPatientBean(PatientBean patientBean){
        try(Connection cn = Administrator.getCn()) {
            String sql = "select * from ocs_tbl_patient where user_id=?";      /// Aaa baki 6e
            try (PreparedStatement ps = cn.prepareStatement(sql)) {
                ps.setString(1,patientBean.getUserId());
                try (ResultSet rs = ps.executeQuery()) {
                    if (rs.next())
                        return true;
                }
            }
        }
        catch (Exception ex){
            System.out.println("ERROR in check Patient Method" + ex);
        }
        return false;
    }

    public static boolean deletePatientBean(PatientBean patientBean){
        try(Connection cn = Administrator.getCn()){
            String sql = "delete from ocs_tbl_patient where patient_id=?;";
            try(PreparedStatement ps = cn.prepareStatement(sql)){
                ps.setInt(1,patientBean.getPatientId());
                ps.executeUpdate();
                return true;
            }
        }
        catch (Exception ex){
            System.out.println("ERROR in delete Patient Bean Method" + ex);
        }
        return false;
    }

   /* public static boolean updatePatientBean(PatientBean patientBean){
        try(Connection cn = Administrator.getCn()){
            //,`user_id`=[value-2],`apoointment_date`=[value-3],
            // `ailment_type`=[value-4],`ailment_details`=[value-5],`diagnosis_history`=[value-6] WHERE 1

            String sql = "update ocs_tbl_patient set user_id=?,lastname=?,dob=?," +
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
            System.out.println("ERROR in update Patient Method" + ex);
        }
        return false;
    }*/

    public static ArrayList<ScheduleBean> getScheduleBean(){
        ArrayList<ScheduleBean> list = new ArrayList<>();
        try(Connection cn = Administrator.getCn()){
            String sql = "SELECT ocs_tbl_schedules.*,ocs_tbl_doctor.* FROM ocs_tbl_schedules " +
                    "INNER JOIN ocs_tbl_doctor ON ocs_tbl_doctor.doctor_id=ocs_tbl_schedules.doctor_id";
            try(PreparedStatement ps = cn.prepareStatement(sql)){
                try(ResultSet rs = ps.executeQuery()){
                    while(rs.next()){
                        list.add(new ScheduleBean(rs.getInt("ocs_tbl_schedules.schedule_id"),
                                rs.getInt("ocs_tbl_schedules.doctor_id"),
                                new DoctorBean(rs.getInt("ocs_tbl_doctor.doctor_id"),
                                        rs.getString("ocs_tbl_doctor.doctor_name"),
                                        rs.getString("ocs_tbl_doctor.specialization")),
                                rs.getString("ocs_tbl_schedules.avilable_days"),
                                rs.getString("ocs_tbl_schedules.slot")));
                    }
                }
            }
        }
        catch(Exception ex){
            System.out.println("ERROR in gets Profile Bean Method" + ex);
        }
        return list;
    }

    public static ArrayList<ProfileBean> getProfileBean(String userId){
        ArrayList<ProfileBean> list = new ArrayList<>();
        try(Connection cn = Administrator.getCn()){
            String sql = "select * from ocs_tbl_user_profile where user_id=?";
            try(PreparedStatement ps = cn.prepareStatement(sql)){
                ps.setString(1,userId);
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

    public static ArrayList<AppointmentBean> getAppointmentBean(String userId){
        ArrayList<AppointmentBean> list = new ArrayList<>();
        try(Connection cn = Administrator.getCn()){
            String sql = "SELECT ocs_tbl_appointments.*,ocs_tbl_doctor.*,ocs_tbl_patient.*,ocs_tbl_user_profile.*" +
                    " FROM ocs_tbl_appointments INNER JOIN ocs_tbl_doctor ON ocs_tbl_doctor.doctor_id=ocs_tbl_appointments.doctor_id" +
                    " JOIN ocs_tbl_patient ON ocs_tbl_patient.patient_id=ocs_tbl_appointments.patient_id JOIN" +
                    " ocs_tbl_user_profile ON ocs_tbl_user_profile.user_id=ocs_tbl_patient.user_id WHERE " +
                    "ocs_tbl_patient.user_id=?";
            try(PreparedStatement ps = cn.prepareStatement(sql)){
                ps.setString(1,userId);
                try(ResultSet rs = ps.executeQuery()){
                    while(rs.next()){
                        list.add(new AppointmentBean(rs.getInt("ocs_tbl_appointments.app_id"),
                                new DoctorBean(rs.getInt("ocs_tbl_doctor.doctor_id"),
                                        rs.getString("ocs_tbl_doctor.doctor_name"),
                                        rs.getString("ocs_tbl_doctor.specialization")),
                                new PatientBean(rs.getInt("ocs_tbl_patient.patient_id"),
                                        rs.getString("ocs_tbl_patient.user_id"),
                                        rs.getDate("ocs_tbl_patient.apoointment_date"),
                                        rs.getString("ocs_tbl_patient.ailment_type"),
                                        rs.getString("ocs_tbl_patient.ailment_details"),
                                        rs.getString("ocs_tbl_patient.diagnosis_history")),
                                rs.getDate("ocs_tbl_appointments.app_date"),
                                rs.getString("ocs_tbl_appointments.app_time")));
                    }
                }
            }
        }
        catch(Exception ex){
            System.out.println("ERROR in gets Appointment Bean Method" + ex);
        }
        return list;
    }

    public static boolean insertAppointmentBean(AppointmentBean appointmentBean){
        try(Connection cn = Administrator.getCn()){
            String sql = "insert into ocs_tbl_appointments(doctor_id,patient_id,app_date,app_time) " +
                    "values(?,?,?,?);";
            try (PreparedStatement ps = cn.prepareStatement(sql)) {
                ps.setInt(1,appointmentBean.getDoctorId());
                ps.setInt(2,appointmentBean.getPatientId());
                ps.setDate(3,new java.sql.Date(appointmentBean.getAppointmentDate().getTime()));
                ps.setString(4,appointmentBean.getAppointmentTime());
                ps.executeUpdate();
                return true;
            }
        }
        catch (Exception ex){
            System.out.println("ERROR in insert AppointmentBean Method" + ex);
        }
        return false;
    }
}
                     /*   new ProfileBean(rs.getString("ocs_tbl_user_profile.user_id"),
                                rs.getString("ocs_tbl_user_profile.firstname")),*/