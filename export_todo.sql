CREATE DATABASE todolist WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'French_France.1252';

ALTER DATABASE todolist OWNER TO postgres;

\connect todolist

CREATE TABLE public.todolist (
    id integer NOT NULL,
    task text NOT NULL,
    theme text NOT NULL,
    state boolean DEFAULT false
);

ALTER TABLE public.todolist OWNER TO postgres;

CREATE SEQUENCE public.todolist_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.todolist_id_seq OWNER TO postgres;

ALTER SEQUENCE public.todolist_id_seq OWNED BY public.todolist.id;

ALTER TABLE ONLY public.todolist ALTER COLUMN id SET DEFAULT nextval('public.todolist_id_seq'::regclass);

SELECT pg_catalog.setval('public.todolist_id_seq', 4, true);

ALTER TABLE ONLY public.todolist
    ADD CONSTRAINT todolist_pkey PRIMARY KEY (id);

INSERT INTO todolist (task, theme, state) VALUES

  ('Acheter du lait', 'Courses', FALSE),

  ('Préparer la présentation', 'Travail', TRUE),

  ('Appeler le médecin', 'Santé', FALSE),

  ('Réserver des billets de train', 'Voyage', FALSE),

  ('Faire le ménage', 'Maison', TRUE);