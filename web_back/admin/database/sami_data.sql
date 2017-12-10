--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.10
-- Dumped by pg_dump version 9.5.10

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

SET search_path = public, pg_catalog;

--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: -
--

INSERT INTO users VALUES (3, '46259540', NULL, NULL, NULL, 'Jorge', 'Garcia');
INSERT INTO users VALUES (2, '46193536', NULL, NULL, NULL, 'Cesar', 'Juarez');
INSERT INTO users VALUES (1, '46670589', NULL, NULL, NULL, 'Dante', 'Cuevas');


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: -
--

SELECT pg_catalog.setval('users_id_seq', 1, false);


--
-- PostgreSQL database dump complete
--

