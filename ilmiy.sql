/*
 Navicat Premium Data Transfer

 Source Server         : ttt
 Source Server Type    : PostgreSQL
 Source Server Version : 90617
 Source Host           : localhost:5432
 Source Catalog        : postgres
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 90617
 File Encoding         : 65001

 Date: 02/03/2021 10:10:47
*/


-- ----------------------------
-- Sequence structure for cours_block_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."cours_block_id_seq";
CREATE SEQUENCE "public"."cours_block_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for cours_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."cours_id_seq";
CREATE SEQUENCE "public"."cours_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for language_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."language_id_seq";
CREATE SEQUENCE "public"."language_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for region_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."region_id_seq";
CREATE SEQUENCE "public"."region_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for registered_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."registered_id_seq";
CREATE SEQUENCE "public"."registered_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for role_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."role_id_seq";
CREATE SEQUENCE "public"."role_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for user_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."user_id_seq";
CREATE SEQUENCE "public"."user_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Table structure for cours
-- ----------------------------
DROP TABLE IF EXISTS "public"."cours";
CREATE TABLE "public"."cours" (
  "id" int4 NOT NULL DEFAULT nextval('cours_id_seq'::regclass),
  "name_uz" varchar(255) COLLATE "pg_catalog"."default",
  "name_ru" varchar(255) COLLATE "pg_catalog"."default",
  "name_en" varchar(255) COLLATE "pg_catalog"."default",
  "image" varchar(255) COLLATE "pg_catalog"."default",
  "status" int4 DEFAULT 1
)
;

-- ----------------------------
-- Records of cours
-- ----------------------------
INSERT INTO "public"."cours" VALUES (1, ' Koreys tili bo''yicha  o''quv kurslari ', ' Koreys tili bo''yicha  o''quv kurslari ', ' Koreys tili bo''yicha  o''quv kurslari ', 'uploads/cours/1614572502.2154.jpg', 1);
INSERT INTO "public"."cours" VALUES (2, 'Ingliz tili bo''yicha  <br> o''quv kurslari', 'Ingliz tili bo''yicha  <br> o''quv kurslari', 'Ingliz tili bo''yicha  <br> o''quv kurslari', 'uploads/cours/1614573113.5716.jpg', 1);

-- ----------------------------
-- Table structure for cours_block
-- ----------------------------
DROP TABLE IF EXISTS "public"."cours_block";
CREATE TABLE "public"."cours_block" (
  "id" int4 NOT NULL DEFAULT nextval('cours_block_id_seq'::regclass),
  "cours_id" int4,
  "name_uz" varchar(255) COLLATE "pg_catalog"."default",
  "name_ru" varchar(255) COLLATE "pg_catalog"."default",
  "name_en" varchar(255) COLLATE "pg_catalog"."default",
  "status" int4 DEFAULT 1
)
;

-- ----------------------------
-- Records of cours_block
-- ----------------------------
INSERT INTO "public"."cours_block" VALUES (1, 1, 'Koreys tili  o''quv kursi (3 oylik)', 'Koreys tili  o''quv kursi (3 oylik)', 'Koreys tili  o''quv kursi (3 oylik)', 1);
INSERT INTO "public"."cours_block" VALUES (2, 1, 'Koreys tili  o''quv kursi (6 oylik)', 'Koreys tili  o''quv kursi (6 oylik)', 'Koreys tili  o''quv kursi (6 oylik)', 1);
INSERT INTO "public"."cours_block" VALUES (3, 2, 'Ingliz tili bo''yicha  <br> o''quv kurslari (6 oylik)', 'Ingliz tili bo''yicha  <br> o''quv kurslari (6 oylik)', 'Ingliz tili bo''yicha  <br> o''quv kurslari (6 oylik)', 1);

-- ----------------------------
-- Table structure for language
-- ----------------------------
DROP TABLE IF EXISTS "public"."language";
CREATE TABLE "public"."language" (
  "id" int4 NOT NULL DEFAULT nextval('language_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "code" varchar(32) COLLATE "pg_catalog"."default" NOT NULL,
  "status" int2 NOT NULL DEFAULT 10
)
;

-- ----------------------------
-- Records of language
-- ----------------------------
INSERT INTO "public"."language" VALUES (1, 'O''zbek', 'Uz', 1);

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS "public"."migration";
CREATE TABLE "public"."migration" (
  "version" varchar(180) COLLATE "pg_catalog"."default" NOT NULL,
  "apply_time" int4
)
;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO "public"."migration" VALUES ('m000000_000000_base', 1614601302);
INSERT INTO "public"."migration" VALUES ('m130524_201442_init', 1614601306);
INSERT INTO "public"."migration" VALUES ('m190124_110200_add_verification_token_column_to_user_table', 1614601306);
INSERT INTO "public"."migration" VALUES ('m210226_070723_create_cours_table', 1614601306);
INSERT INTO "public"."migration" VALUES ('m210226_111331_add_phone_to_column_registered_table', 1614601306);

-- ----------------------------
-- Table structure for region
-- ----------------------------
DROP TABLE IF EXISTS "public"."region";
CREATE TABLE "public"."region" (
  "id" int4 NOT NULL DEFAULT nextval('region_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "status" int2 NOT NULL DEFAULT 10
)
;

-- ----------------------------
-- Records of region
-- ----------------------------
INSERT INTO "public"."region" VALUES (1, 'Qoraqalpogiston', 1);
INSERT INTO "public"."region" VALUES (2, 'Andijon', 1);
INSERT INTO "public"."region" VALUES (3, 'Namangan', 1);
INSERT INTO "public"."region" VALUES (4, 'Farg''ona', 1);
INSERT INTO "public"."region" VALUES (5, 'Buxoro', 1);
INSERT INTO "public"."region" VALUES (6, 'Xorazm', 1);
INSERT INTO "public"."region" VALUES (7, 'Surxandaryo', 1);
INSERT INTO "public"."region" VALUES (8, 'Qashqadaryo', 1);
INSERT INTO "public"."region" VALUES (9, 'Jizzax', 1);
INSERT INTO "public"."region" VALUES (10, 'Navoiy', 1);
INSERT INTO "public"."region" VALUES (11, 'Samarqand', 1);
INSERT INTO "public"."region" VALUES (12, 'Sirdaryo', 1);
INSERT INTO "public"."region" VALUES (13, 'Toshkent shahri', 1);

-- ----------------------------
-- Table structure for registered
-- ----------------------------
DROP TABLE IF EXISTS "public"."registered";
CREATE TABLE "public"."registered" (
  "id" int4 NOT NULL DEFAULT nextval('registered_id_seq'::regclass),
  "name" varchar(32) COLLATE "pg_catalog"."default" NOT NULL,
  "lastname" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "fname" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "pser" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "pnum" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "region_id" int4,
  "type" int4,
  "lang_id" int4,
  "status" int2 NOT NULL DEFAULT 10,
  "created_at" int4 NOT NULL,
  "updated_at" int4 NOT NULL,
  "phone" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of registered
-- ----------------------------
INSERT INTO "public"."registered" VALUES (1, 'Abdulloh', 'Bobojonov', 'Shuxratjonovich', 'AB', '1234566', NULL, 2, NULL, 10, 1614601500, 1614601500, '+12345-647-87-87');
INSERT INTO "public"."registered" VALUES (2, 'A', 'A', 'A', 'AA', '1111111', 1, 2, 1, 10, 1, 1, '+11111-111-11-11');
INSERT INTO "public"."registered" VALUES (3, 'sss', 'sss', 'sss', 'SS', '2222222', 6, 2, 1, 10, 1, 1, '+22222-222-22-22');
INSERT INTO "public"."registered" VALUES (5, 'rrr', 'rrr', 'rrrr', 'RR', '2222112', 5, 2, 1, 10, 1614606308, 1614606308, '+22222-222-22-22');
INSERT INTO "public"."registered" VALUES (8, 'dddd', 'ddddd', 'dddd', 'DD', '1231313', 5, 2, 1, 10, 1614606735, 1614606735, '+12312-312-31-23');
INSERT INTO "public"."registered" VALUES (10, 'Eshonov', 'Baxodir', 'tursunovich', 'AA', '1111112', 1, 2, 1, 10, 1614607603, 1614607603, '+11111-111-11-11');
INSERT INTO "public"."registered" VALUES (11, 'Eshonov ', 'Baxodir', 'Tursonovich', 'AA', '1112222', 1, 2, 1, 10, 1614658671, 1614658671, '+99999-999-99-99');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS "public"."role";
CREATE TABLE "public"."role" (
  "id" int4 NOT NULL DEFAULT nextval('role_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO "public"."role" VALUES (1, 'admin');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS "public"."user";
CREATE TABLE "public"."user" (
  "id" int4 NOT NULL DEFAULT nextval('user_id_seq'::regclass),
  "username" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "role_id" int4,
  "auth_key" varchar(32) COLLATE "pg_catalog"."default" NOT NULL,
  "password_hash" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "password_reset_token" varchar(255) COLLATE "pg_catalog"."default",
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "status" int2 NOT NULL DEFAULT 10,
  "created_at" int4 NOT NULL,
  "updated_at" int4 NOT NULL,
  "verification_token" varchar(255) COLLATE "pg_catalog"."default" DEFAULT NULL::character varying
)
;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO "public"."user" VALUES (1, 'ilmiy_dtm', 1, 'ZwPmed4k2QqskqJ1dEkE', '$2y$13$O79GesLLLds6W.gxGrXo1eobPbCJ5sZPRCEdfL3oMuj2NvONnLvBO', NULL, 'ilmiy_markaz@dtm.uz', 10, 1614601306, 1614601306, NULL);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."cours_block_id_seq"
OWNED BY "public"."cours_block"."id";
SELECT setval('"public"."cours_block_id_seq"', 2, false);
ALTER SEQUENCE "public"."cours_id_seq"
OWNED BY "public"."cours"."id";
SELECT setval('"public"."cours_id_seq"', 2, false);
ALTER SEQUENCE "public"."language_id_seq"
OWNED BY "public"."language"."id";
SELECT setval('"public"."language_id_seq"', 2, false);
ALTER SEQUENCE "public"."region_id_seq"
OWNED BY "public"."region"."id";
SELECT setval('"public"."region_id_seq"', 2, false);
ALTER SEQUENCE "public"."registered_id_seq"
OWNED BY "public"."registered"."id";
SELECT setval('"public"."registered_id_seq"', 12, true);
ALTER SEQUENCE "public"."role_id_seq"
OWNED BY "public"."role"."id";
SELECT setval('"public"."role_id_seq"', 2, true);
ALTER SEQUENCE "public"."user_id_seq"
OWNED BY "public"."user"."id";
SELECT setval('"public"."user_id_seq"', 2, true);

-- ----------------------------
-- Primary Key structure for table cours
-- ----------------------------
ALTER TABLE "public"."cours" ADD CONSTRAINT "cours_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table cours_block
-- ----------------------------
CREATE INDEX "idx-cours_block-cours_id" ON "public"."cours_block" USING btree (
  "cours_id" "pg_catalog"."int4_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table cours_block
-- ----------------------------
ALTER TABLE "public"."cours_block" ADD CONSTRAINT "cours_block_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table language
-- ----------------------------
ALTER TABLE "public"."language" ADD CONSTRAINT "language_name_key" UNIQUE ("name");

-- ----------------------------
-- Primary Key structure for table language
-- ----------------------------
ALTER TABLE "public"."language" ADD CONSTRAINT "language_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table migration
-- ----------------------------
ALTER TABLE "public"."migration" ADD CONSTRAINT "migration_pkey" PRIMARY KEY ("version");

-- ----------------------------
-- Uniques structure for table region
-- ----------------------------
ALTER TABLE "public"."region" ADD CONSTRAINT "region_name_key" UNIQUE ("name");

-- ----------------------------
-- Primary Key structure for table region
-- ----------------------------
ALTER TABLE "public"."region" ADD CONSTRAINT "region_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table registered
-- ----------------------------
ALTER TABLE "public"."registered" ADD CONSTRAINT "registered_pser_pnum_key" UNIQUE ("pser", "pnum");

-- ----------------------------
-- Primary Key structure for table registered
-- ----------------------------
ALTER TABLE "public"."registered" ADD CONSTRAINT "registered_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table role
-- ----------------------------
ALTER TABLE "public"."role" ADD CONSTRAINT "role_name_key" UNIQUE ("name");

-- ----------------------------
-- Primary Key structure for table role
-- ----------------------------
ALTER TABLE "public"."role" ADD CONSTRAINT "role_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table user
-- ----------------------------
ALTER TABLE "public"."user" ADD CONSTRAINT "user_username_key" UNIQUE ("username");
ALTER TABLE "public"."user" ADD CONSTRAINT "user_password_reset_token_key" UNIQUE ("password_reset_token");
ALTER TABLE "public"."user" ADD CONSTRAINT "user_email_key" UNIQUE ("email");

-- ----------------------------
-- Primary Key structure for table user
-- ----------------------------
ALTER TABLE "public"."user" ADD CONSTRAINT "user_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table cours_block
-- ----------------------------
ALTER TABLE "public"."cours_block" ADD CONSTRAINT "fk-cours_block-cours_id" FOREIGN KEY ("cours_id") REFERENCES "public"."cours" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
