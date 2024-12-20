CREATE TABLE public.todolist (
    id SERIAL PRIMARY KEY,
    task text NOT NULL,
    theme text NOT NULL,
    state boolean DEFAULT false
);

ALTER TABLE public.todolist OWNER TO postgres;   
    

INSERT INTO todolist (task, theme, state) VALUES
    ('Acheter du lait', 'Courses', FALSE),
    ('Préparer la présentation', 'Travail', TRUE),
    ('Appeler le médecin', 'Santé', FALSE),
    ('Réserver des billets de train', 'Voyage', FALSE),
    ('Faire le ménage', 'Maison', TRUE);