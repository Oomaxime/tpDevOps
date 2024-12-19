--
-- PostgreSQL database dump
--

-- Dumped from database version 17.2
-- Dumped by pg_dump version 17.2

-- Started on 2024-12-19 15:00:55

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 4797 (class 1262 OID 16552)
-- Name: todolist; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE todolist WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'French_France.1252';


ALTER DATABASE todolist OWNER TO postgres;

\connect todolist

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 218 (class 1259 OID 16577)
-- Name: todolist; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.todolist (
    id integer NOT NULL,
    task text NOT NULL,
    theme text NOT NULL,
    state boolean DEFAULT false
);


ALTER TABLE public.todolist OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 16576)
-- Name: todolist_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.todolist_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.todolist_id_seq OWNER TO postgres;

--
-- TOC entry 4798 (class 0 OID 0)
-- Dependencies: 217
-- Name: todolist_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.todolist_id_seq OWNED BY public.todolist.id;


--
-- TOC entry 4641 (class 2604 OID 16580)
-- Name: todolist id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.todolist ALTER COLUMN id SET DEFAULT nextval('public.todolist_id_seq'::regclass);


--
-- TOC entry 4791 (class 0 OID 16577)
-- Dependencies: 218
-- Data for Name: todolist; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.todolist (id, task, theme, state) FROM stdin;
1	Acheter des fournitures	Courses	f
2	Appeler le client	Travail	t
3	Planifier les vacances	Loisirs	f
4	task test 1	project	f
\.


--
-- TOC entry 4799 (class 0 OID 0)
-- Dependencies: 217
-- Name: todolist_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.todolist_id_seq', 4, true);


--
-- TOC entry 4644 (class 2606 OID 16585)
-- Name: todolist todolist_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.todolist
    ADD CONSTRAINT todolist_pkey PRIMARY KEY (id);


-- Completed on 2024-12-19 15:00:55

--
-- PostgreSQL database dump complete
--

