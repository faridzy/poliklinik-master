/*
* @Author: ELL
* @Date:   2018-01-16 17:07:00
* @Last Modified by:   ELL
* @Last Modified time: 2018-01-16 18:51:24
*/


-- select * from USER_TABLES;

CREATE TABLE poli (
   ID number primary key,
   NAME varchar2(100),
   PRICE number,
   DESCRIPTION varchar2(100)
);

desc poli;

CREATE TABLE obat(
   ID number primary key,
   NAME varchar2(100),
   DESCRIPTION varchar2(100),
   ID_POLI number,
   PRICE number,
   STOCK number,
   UNIT varchar2(50)
);

desc obat;

CREATE TABLE dokter(
   ID number primary key,
   ID_POLI number,
   NAME varchar2(150),
   GENDER varchar2(1),
   ADDRESS varchar2(150),
   TELP varchar2(15)
);
desc dokter;

CREATE TABLE pasien(
   ID number primary key,
   NAME varchar2(150),
   GENDER varchar2(1),
   ADDRESS varchar2(150),
   TELP varchar2(15),
   REGIS_DATE date  default sysdate
);
desc pasien;

CREATE TABLE users(
   ID number primary key,
   NAME varchar2(150),
   EMAIL varchar2(150),
   PASSWORD varchar2(150),
   ACTIVE varchar2(2)
);
desc users;

CREATE TABLE medical_record(
   ID number primary key,
   ID_PASIEN number,
   ID_POLI number,
   ID_DOKTER number,
   DATE_TRANSACTION date,
   TOTAL float,
   COMPLAINT varchar2(150),
   SOLUTION varchar2(200),
   STATUS_CEK number
);
desc medical_record;

CREATE TABLE detail_medical_record(
   ID number primary key,
   ID_MEDICAL_RECORD number,
   ID_OBAT number,
   QTY number
);
desc detail_medical_record;

COMMIT;