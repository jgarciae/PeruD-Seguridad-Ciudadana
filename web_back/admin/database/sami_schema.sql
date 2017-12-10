-- Adminer 4.3.1 PostgreSQL dump

DROP TABLE IF EXISTS "cops";
CREATE SEQUENCE cops_id_seq INCREMENT  MINVALUE  MAXVALUE  START 1 CACHE ;

CREATE TABLE "public"."cops" (
    "id" bigint DEFAULT nextval('cops_id_seq') NOT NULL,
    "dni" character varying(8),
    "password" character varying(128),
    "station_id" bigint,
    "created" timestamp,
    "modified" timestamp,
    CONSTRAINT "cops_pkey" PRIMARY KEY ("id")
) WITH (oids = false);


DROP TABLE IF EXISTS "stations";
CREATE SEQUENCE stations_id_seq INCREMENT  MINVALUE  MAXVALUE  START 1 CACHE ;

CREATE TABLE "public"."stations" (
    "id" bigint DEFAULT nextval('stations_id_seq') NOT NULL,
    "name" character varying(128),
    "city" character varying(128),
    "province" character varying(128),
    "state" character varying(128),
    "created" timestamp,
    "modified" timestamp,
    CONSTRAINT "stations_pkey" PRIMARY KEY ("id")
) WITH (oids = false);


DROP TABLE IF EXISTS "users";
CREATE SEQUENCE users_id_seq INCREMENT  MINVALUE  MAXVALUE  START 1 CACHE ;

CREATE TABLE "public"."users" (
    "id" bigint DEFAULT nextval('users_id_seq') NOT NULL,
    "dni" character varying(8),
    "password" character varying(128),
    "created" timestamp,
    "modified" timestamp,
    "first_name" character varying(64),
    "last_name" character varying(128),
    CONSTRAINT "users_pkey" PRIMARY KEY ("id")
) WITH (oids = false);


DROP TABLE IF EXISTS "registers";
CREATE SEQUENCE registers_id_seq INCREMENT  MINVALUE  MAXVALUE  START 1 CACHE ;

CREATE TABLE "public"."registers" (
    "id" integer DEFAULT nextval('registers_id_seq') NOT NULL,
    "departments" text,
    "provinces" text,
    "districts" text,
    "cities" text,
    "stations" text,
    "generic" text,
    "specific" text,
    "modality" text,
    "place" text,
    "relationship" text,
    "half_used" text,
    "age" text,
    "gender" text,
    "year_2011" text,
    "year_2012" text,
    "year_2013" text,
    "year_2014" text,
    "year_2015" text,
    "year_2016" text,
    CONSTRAINT "registers_id" PRIMARY KEY ("id")
) WITH (oids = false);


-- 2017-12-09 21:34:49.015932-05
