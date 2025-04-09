-- Insertion des utilisateurs
INSERT INTO User (user_firstName, user_lastName, user_email, user_phone, user_address) VALUES 
('Neo', 'Anderson', 'neo.anderson@email.fr', '06 12 34 56 78', '15 rue des Lilas, 75001 Paris'),
('Trinity', 'Smith', 'trinity.smith@email.fr', '06 23 45 67 89', '27 avenue Victor Hugo, 69002 Lyon'),
('Morpheus', 'Johnson', 'morpheus.johnson@email.fr', '06 34 56 78 90', '8 boulevard Gambetta, 33000 Bordeaux'),
('Oracle', 'Davis', 'oracle.davis@email.fr', '06 45 67 89 01', '42 rue de la République, 13001 Marseille'),
('Agent', 'Smith', 'agent.smith@email.fr', '06 56 78 90 12', '3 place des Arts, 59000 Lille'),
('Bruce', 'Wayne', 'bruce.wayne@email.fr', '06 67 89 01 23', '18 rue Saint-Michel, 44000 Nantes'),
('Jean', 'Valjean', 'jean.valjean@email.fr', '06 78 90 12 34', '55 avenue Jean Jaurès, 31000 Toulouse'),
('Niobe', 'Johnson', 'niobe.johnson@email.fr', '06 89 01 23 45', '12 rue des Fleurs, 67000 Strasbourg');

-- Insertion des comptes
INSERT INTO Account (account_iban, account_type, account_balance, user_id) VALUES 
-- Neo Anderson a 2 comptes
('FR76 1234 5678 9123 4567 8912 345', 'Compte courant', 2500.50, 1),
('FR76 2345 6789 1234 5678 9123 456', 'Compte épargne', 15000.75, 1),

-- Trinity Smith a 3 comptes
('FR76 3456 7891 2345 6789 1234 567', 'Compte courant', 1200.25, 2),
('FR76 4567 8912 3456 7891 2345 678', 'Compte épargne', 8500.00, 2),
('FR76 5678 9123 4567 8912 3456 789', 'Compte courant', 750.30, 2),

-- Morpheus Johnson a 1 compte
('FR76 6789 1234 5678 9123 4567 890', 'Compte courant', -250.75, 3),

-- Oracle Davis n'a pas de compte

-- Agent Smith a 3 comptes
('FR76 8901 2345 6789 1234 5678 901', 'Compte courant', 3200.45, 5),
('FR76 9012 3456 7891 2345 6789 012', 'Compte épargne', 22000.00, 5),
('FR76 0123 4567 8912 3456 7890 123', 'Compte courant', 540.60, 5),

-- Bruce Wayne n'a pas de compte

-- Jean Valjean a 1 compte
('FR76 1234 5678 9012 3456 7890 124', 'Compte épargne', 5600.80, 7),

-- Niobe Johnson a 2 comptes
('FR76 2345 6789 0123 4567 8901 235', 'Compte courant', 890.15, 8),
('FR76 3456 7890 1234 5678 9012 346', 'Compte épargne', 12500.20, 8);

-- Insertion des contrats
INSERT INTO Contract (contract_type, contract_cost, contract_duration, user_id) VALUES 
-- Neo Anderson a 1 contrat
('Assurance vie', 120.00, 12, 1),

-- Trinity Smith a 2 contrats
('Assurance habitation', 80.00, 12, 2),
('Crédit immobilier', 450.00, 240, 2),

-- Morpheus Johnson n'a pas de contrat

-- Oracle Davis a 3 contrats
('Assurance vie', 100.00, 12, 4),
('Crédit immobilier', 650.00, 300, 4),
('Assurance habitation', 50.00, 12, 4),

-- Agent Smith a 1 contrat
('Crédit à la consommation', 150.00, 24, 5),

-- Bruce Wayne n'a pas de contrat

-- Jean Valjean a 2 contrats
('Compte épargne logement', 90.00, 60, 7),
('Assurance habitation', 40.00, 12, 7),

-- Niobe Johnson a 1 contrat
('Crédit à la consommation', 110.00, 36, 8);

-- Insertion d'un administrateur
INSERT INTO Admin (admin_email, admin_password) VALUES 
('admin@banque.fr', '$2y$10$.JntAryqeQ4XWmOURN3N6.pwKa1RIYA8iJ1WSX3gcu67Q6sY9gTSy'); -- Mot de passe haché: 'admin1234'