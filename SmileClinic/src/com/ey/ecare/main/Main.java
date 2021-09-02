package com.ey.ecare.main;

import com.ey.ecare.bean.*;
import com.ey.ecare.dao.*;

import java.sql.*;
import java.util.*;
import java.text.*;

public class Main {

    public static void main(String[] args) {

        SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
        CredentialsBean cb;
        DoctorBean doctorBean;
        ScheduleBean scheduleBean;
        String date;
        ProfileBean profileBean;
        int id;
        PatientBean patientBean;
        AppointmentBean appointmentBean;

        Scanner sc = new Scanner(System.in);

        loop1 : while(true) {
            System.out.print("\n\n1.Login\n2.Create New User\n3.Exit\nEnter Choose Option:");
            int a = sc.nextInt();

            switch (a) {
                case 1:
                    cb = new CredentialsBean();
                    System.out.print("\nUserId: ");
                    cb.setUserId(sc.next());
                    System.out.print("Password: ");
                    cb.setPassword(sc.next());
                    loop2 : while (true) {
                        System.out.print("User Type:\n\t1.Admin\n\t2.Reporter\n\t3.Patient\n\tEnter Choose Option:");
                        switch(sc.nextInt()){
                            case 1:
                                cb.setUserType("A");
                                break loop2;
                            case 2:
                                cb.setUserType("R");
                                break loop2;
                            case 3:
                                cb.setUserType("P");
                                break loop2;
                            default:
                                System.out.println("\nyou assigned anther Number \nTry Again ");
                        }
                    }


                    if(Administrator.checkCredentialsUserId(cb)){
                        if(Administrator.checkCredentials(cb)){
                            if(Administrator.login(cb)) {
                                System.out.println("User Successfully Login");
                                if (cb.getUserType() == "A") {
                                    /*loopA1 : while (true){
                                        System.out.println("\n1.");
                                    }*/


                                    //System.out.println("Hello Doctor...");
                                    //cb.setUserType("A");*/
                                    loop4:
                                    while (true) {
                                        System.out.print("\nAdmin Details:\n\t1.Add Doctor Details\n\t2.Update Doctor Details\n\t3.Delete Doctor Details" +
                                                "\n\t4.View Doctor Details\n\t5.Suggest alternate doctor\n\t6.Change Password\n\t7.Logout\n\tEnter Choose Option:");
                                        switch (sc.nextInt()) {
                                            case 1:
                                                doctorBean = new DoctorBean();
                                                System.out.println("\nDoctor Name:");
                                                doctorBean.setDoctorName(sc.next());
                                                System.out.println("\nExample : YYYY-MM-DD");
                                                System.out.println("\nBirth Of Date:");
                                                date = sc.next();
                                                try {
                                                    doctorBean.setDateOfBirth(sdf.parse(date));
                                                } catch (ParseException e) {
                                                    System.out.println("Parse Exception");
                                                }
                                                System.out.println("\nExample : YYYY-MM-DD");
                                                System.out.println("\nDate Of Join:");
                                                date = sc.next();
                                                try {
                                                    doctorBean.setDateOfJoining(sdf.parse(date));
                                                } catch (ParseException e) {
                                                    System.out.println("Parse Exception");
                                                }
                                                System.out.println("\nGender:");
                                                doctorBean.setGender(sc.next());
                                                System.out.println("\nQualification:");
                                                doctorBean.setQualification(sc.next());
                                                System.out.println("\nSpecification:");
                                                doctorBean.setSpecialization(sc.next());
                                                System.out.println("\nYear Of Experience:");
                                                doctorBean.setYearsOfExperience(sc.nextInt());
                                                System.out.println("\nStreet:");
                                                doctorBean.setStreet(sc.next());
                                                System.out.println("\nLocation:");
                                                doctorBean.setLocation(sc.next());
                                                System.out.println("\nCity:");
                                                doctorBean.setCity(sc.next());
                                                System.out.println("\nState:");
                                                doctorBean.setState(sc.next());
                                                System.out.println("\nPincode:");
                                                doctorBean.setPincode(sc.next());
                                                System.out.println("\nContact Number:");
                                                doctorBean.setContactNumber(sc.next());
                                                System.out.println("\nEmail Id:");
                                                doctorBean.setEmailId(sc.next());
                                                if (Administrator.insertDoctor(doctorBean)) {
                                                    System.out.println("\n\nDoctor Details Successfully Recorded....\n");
                                                } else {
                                                    System.out.println("\n\nDoctor Details not Recorded....\n");
                                                }
                                                break;
                                            case 2:
                                                doctorBean = new DoctorBean();
                                                doctorBean.displayDoctorBean();
                                                System.out.println("\n Update Details:\nEnter the Doctor Id :");
                                                doctorBean.setDoctorId(sc.nextInt());
                                                System.out.println("\nDoctor Name:");
                                                doctorBean.setDoctorName(sc.next());
                                                System.out.println("\nExample : YYYY-MM-DD");
                                                System.out.println("\nBirth Of Date:");
                                                date = sc.next();
                                                try {
                                                    doctorBean.setDateOfBirth(sdf.parse(date));
                                                } catch (ParseException e) {
                                                    System.out.println("Parse Exception");
                                                }
                                                System.out.println("\nExample : YYYY-MM-DD");
                                                System.out.println("\nDate Of Join:");
                                                date = sc.next();
                                                try {
                                                    doctorBean.setDateOfJoining(sdf.parse(date));
                                                } catch (ParseException e) {
                                                    System.out.println("Parse Exception");
                                                }
                                                System.out.println("\nGender:");
                                                doctorBean.setGender(sc.next());
                                                System.out.println("\nQualification:");
                                                doctorBean.setQualification(sc.next());
                                                System.out.println("\nSpecification:");
                                                doctorBean.setSpecialization(sc.next());
                                                System.out.println("\nYear Of Experience:");
                                                doctorBean.setYearsOfExperience(sc.nextInt());
                                                System.out.println("\nStreet:");
                                                doctorBean.setStreet(sc.next());
                                                System.out.println("\nLocation:");
                                                doctorBean.setLocation(sc.next());
                                                System.out.println("\nCity:");
                                                doctorBean.setCity(sc.next());
                                                System.out.println("\nState:");
                                                doctorBean.setState(sc.next());
                                                System.out.println("\nPincode:");
                                                doctorBean.setPincode(sc.next());
                                                System.out.println("\nContact Number:");
                                                doctorBean.setContactNumber(sc.next());
                                                System.out.println("\nEmail Id:");
                                                doctorBean.setEmailId(sc.next());
                                                if (Administrator.updateDoctor(doctorBean)) {
                                                    System.out.println("\n\nDoctor Details Successfully Updated....\n");
                                                } else {
                                                    System.out.println("\n\nDoctor Details not updated....\n");
                                                }
                                                break;
                                            case 3:
                                                doctorBean = new DoctorBean();
                                                doctorBean.displayDoctorBean();
                                                System.out.println("\n Delete Details:\nEnter the Doctor Id :");
                                                doctorBean.setDoctorId(sc.nextInt());
                                                if (Administrator.deleteDoctorBean(doctorBean)) {
                                                    System.out.println("\n\nDoctor Details Successfully Delete....\n");
                                                } else {
                                                    System.out.println("\n\nDoctor Details not Delete....\n");
                                                }
                                                break;
                                            case 4:
                                                doctorBean = new DoctorBean();
                                                doctorBean.displayDoctorBean();
                                                break;
                                            case 5:
                                                scheduleBean = new ScheduleBean();
                                                scheduleBean.displayScheduleBean();

                                                break ;
                                            case 6:
                                                System.out.print("\nEnter the New Password:");
                                                cb.setPassword(sc.next());
                                                if(Reporter.changePassword(cb))
                                                    System.out.println("\nPassword Successfully Changed...");
                                                else
                                                    System.out.println("\nPassword Successfully not Changed...");
                                                break;
                                            case 7:
                                                if(Administrator.logout(cb)){
                                                    System.out.println("User Successfully Logout");
                                                }
                                                break loop1;
                                            default:
                                                System.out.println("\nyou assigned anther Number \nTry Again ");
                                        }
                                    }



                                    //System.out.println("this is admin");                    //Admin call
                                } else if (cb.getUserType() == "R") {
                                    loop7:while (true){
                                        System.out.print("\nReporter details:\n\t1.View Doctor Details\n\t2.Leave Doctor Details\n\t" +
                                                "3.Change Password\n\t4.Logout\n\tEnter Choose Option:");
                                        switch (sc.nextInt()) {
                                            case 1:
                                                doctorBean = new DoctorBean();
                                                doctorBean.displayDoctorBean();
                                                break;
                                            case 2:
                                                LeaveBean leaveBean = new LeaveBean();
                                                leaveBean.displayLeaveBean();
                                                break;
                                            case 3:
                                                System.out.print("\nEnter the New Password:");
                                                cb.setPassword(sc.next());
                                                if(Reporter.changePassword(cb))
                                                    System.out.println("\nPassword Successfully Changed...");
                                                else
                                                    System.out.println("\nPassword Successfully not Changed...");
                                                break;
                                            case 4:
                                                if(Administrator.logout(cb)){
                                                    System.out.println("User Successfully Logout");
                                                }
                                                break loop1;
                                            default:
                                                System.out.println("\nyou assigned anther Number \nTry Again ");
                                        }

                                    }               // Reporter call
                                } else if (cb.getUserType() == "P") {
                                    //Patient call
                                    loop6:while (true){
                                        System.out.print("\nPatient details:\n\t1.View Registration Details\n\t2.Edit Registration Details\n\t" +
                                                "3.View Appointment Detail\n\t4.Add Appointment Request\n\t5.Change Password\n\t6.LogOut\n\t" +
                                                "Enter Choose Option:");
                                        switch (sc.nextInt()) {
                                            case 1:
                                                profileBean = new ProfileBean();
                                                profileBean.displayProfileBean(cb.getUserId());
                                                break;
                                            case 2:
                                                profileBean = new ProfileBean();
                                                profileBean.setUserId(cb.getUserId());
                                                System.out.println("Update Details User Id: "+cb.getUserId());
                                                System.out.println("First Name:");
                                                profileBean.setFirstName(sc.next());
                                                System.out.println("\nLast Name:");
                                                profileBean.setLastName(sc.next());
                                                System.out.println("\nExample : YYYY-MM-DD");
                                                System.out.println("\nDate Of Birth:");
                                                date = sc.next();
                                                try {
                                                    profileBean.setDateOfbirth(sdf.parse(date));
                                                } catch (ParseException e) {
                                                    System.out.println("Parse Exception");
                                                }
                                                System.out.println("\nGender:");
                                                profileBean.setGender(sc.next());
                                                System.out.println("\nStreet:");
                                                profileBean.setStreet(sc.next());
                                                System.out.println("\nLocation:");
                                                profileBean.setLocation(sc.next());
                                                System.out.println("\nCity:");
                                                profileBean.setCity(sc.next());
                                                System.out.println("\nState:");
                                                profileBean.setState(sc.next());
                                                System.out.println("\nPincode:");
                                                profileBean.setPincode(sc.next());
                                                System.out.println("\nContact Number:");
                                                profileBean.setMobileNo(sc.next());
                                                System.out.println("\nEmail Id:");
                                                profileBean.setEmailId(sc.next());
                                                if (Administrator.updateProfileBean(profileBean)) {
                                                    System.out.println("\n\nProfile Details Successfully Updated....\n");
                                                } else {
                                                    System.out.println("\n\nProfile Details not updated....\n");
                                                }
                                                break;
                                            case 3:
                                                appointmentBean = new AppointmentBean();
                                                appointmentBean.displayAppointmentBean(cb.getUserId());
                                                break;
                                            case 4:
                                                appointmentBean = new AppointmentBean();
                                                doctorBean = new DoctorBean();
                                                doctorBean.displayDoctorBeanSpecial();
                                                System.out.println("\nEnter the Doctor ID:");
                                                appointmentBean.setDoctorId(sc.nextInt());
                                                appointmentBean.setPatientId(appointmentBean.getId(cb.getUserId()));
                                                System.out.println("\nExample : YYYY-MM-DD");
                                                System.out.println("\nAppointment Date:");
                                                date = sc.next();
                                                try {
                                                    appointmentBean.setAppointmentDate(sdf.parse(date));
                                                } catch (ParseException e) {
                                                    System.out.println("Parse Exception");
                                                }
                                                System.out.println("\nAppointment Date:");
                                                appointmentBean.setAppointmentTime(sc.next());

                                                if (Patient.insertAppointmentBean(appointmentBean)) {
                                                    System.out.println("\n\nAppointment Details Successfully Recoded....\n");
                                                } else {
                                                    System.out.println("\n\nAppointment Details not Recoded....\n");
                                                }
                                                break;
                                            case 5:
                                                System.out.print("\nEnter the New Password:");
                                                cb.setPassword(sc.next());
                                                if(Reporter.changePassword(cb))
                                                    System.out.println("\nPassword Successfully Changed...");
                                                else
                                                    System.out.println("\nPassword Successfully not Changed...");
                                                break;
                                            case 6:
                                                if(Administrator.logout(cb)){
                                                    System.out.println("User Successfully Logout");
                                                }
                                                break loop1;
                                            default:
                                                System.out.println("\nyou assigned anther Number \nTry Again ");
                                        }

                                    }

                                }
                                if(Administrator.logout(cb)){
                                    System.out.println("User Successfully Logout");
                                }
                            }
                        }
                        else{
                            System.out.println("\nUnauthorized User");
                        }
                    }
                    else{
                        System.out.println("\n User Id is Wrong");
                    }

                    break;
                case 2:
                    cb =new CredentialsBean();
                    profileBean = new ProfileBean();
                    System.out.println("\nUserId:");
                    profileBean.setUserId(sc.next());
                    cb.setUserId(profileBean.getUserId());
                    System.out.println("\nFirst Name:");
                    profileBean.setFirstName(sc.next());
                    System.out.println("\nLast Name:");
                    profileBean.setLastName(sc.next());
                    System.out.println("\nPassword:");
                    cb.setPassword(sc.next());
                    System.out.println("\nExample : YYYY-MM-DD");
                    System.out.println("\nBirth Of Date:");
                    date = sc.next();
                    try {
                        profileBean.setDateOfbirth(sdf.parse(date));
                    } catch (ParseException e) {
                        System.out.println("Parse Exception");
                    }
                    System.out.println("\nGender:");
                    profileBean.setGender(sc.next());
                    System.out.println("\nStreet:");
                    profileBean.setStreet(sc.next());
                    System.out.println("\nLocation:");
                    profileBean.setLocation(sc.next());
                    System.out.println("\nCity:");
                    profileBean.setCity(sc.next());
                    System.out.println("\nState:");
                    profileBean.setState(sc.next());
                    System.out.println("\nPincode:");
                    profileBean.setPincode(sc.next());
                    System.out.println("\nContact Number:");
                    profileBean.setMobileNo(sc.next());
                    System.out.println("\nEmail Id:");
                    profileBean.setEmailId(sc.next());
                    System.out.println("\nUser Type:\n\t1.Reporter\n\t2.Patient\n\tEnter the Choose:");
                    int d = sc.nextInt();

                    if(d == 1){
                        cb.setUserType("R");
                    }
                    else{

                        cb.setUserType("P");
                    }
                    if (Administrator.insertProfile(profileBean,cb)) {
                        System.out.println("\n\nData Successfully Recorded....\n");
                        if(cb.getUserType() == "P") {
                            patientBean = new PatientBean();
                            patientBean.setUserId(cb.getUserId());
                            System.out.println("Appointment Date");
                            System.out.println("\nExample : YYYY-MM-DD");
                            System.out.println("Appointment Date");
                            date = sc.next();
                            try {
                                patientBean.setAppointmentDate(sdf.parse(date));
                            } catch (ParseException e) {
                                System.out.println("Parse Exception");
                            }
                            System.out.println("Ailment Type");
                            patientBean.setAlimentType(sc.next());
                            System.out.println("Aliment Details");
                            patientBean.setAlimentDetails(sc.next());
                            System.out.println("Diagnosis History");
                            patientBean.setDiagnosisHistory(sc.next());
                            Patient.insertPatientBean(patientBean);
                        }

                    } else {
                        System.out.println("\n\nData Successfully not Recorded....\n");
                    }
                    break;
                case 3:
                    break loop1;
                default:
                    System.out.println("\nyou assigned anther Number \nTry Again");
            }
        }
    }
}
