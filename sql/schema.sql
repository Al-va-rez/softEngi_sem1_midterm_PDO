CREATE TABLE Player ( 
    player_id INT AUTO_INCREMENT PRIMARY KEY, 
    username VARCHAR(50), 
    password VARCHAR(50), 
    email VARCHAR(50), 
    level_id INT, 
    current_xp INT, 
    inv_id INT, 
    total_playtime DECIMAL(6,2), -- in hours 
    weekly_playtime DECIMAL(4,2), -- in hours 
    date_Registered DATE 
); 
 
CREATE TABLE Level ( 
    level_id INT AUTO_INCREMENT PRIMARY KEY, 
    max_hp INT, 
    max_mp INT, 
    max_stamina INT, 
    required_xp INT, 
    scaling_id INT 
); 
 
CREATE TABLE Scaling ( 
    scaling_id INT AUTO_INCREMENT PRIMARY KEY, 
    max_enemy_hp_multiplier DECIMAL(2,1), 
    enemy_dmg_multiplier DECIMAL(2,1), 
    gold_multiplier DECIMAL(3,2), 
    item_drop_chance DECIMAL(3,2), 
    high_rarity_item_drop_chance DECIMAL(3,2) 
); 
 
CREATE TABLE Inventory ( 
    inv_id INT AUTO_INCREMENT PRIMARY KEY, 
    num_slots INT, 
    isFull BOOLEAN, 
    weight DECIMAL(4,1) 
); 
 
CREATE TABLE armor_junc ( 
    armor_junc_id INT AUTO_INCREMENT PRIMARY KEY, 
    inv_id INT, 
    armor_id INT 
); 
 
CREATE TABLE Armor ( 
    armor_id INT AUTO_INCREMENT PRIMARY KEY, 
    armor_name VARCHAR(21), 
    armor_def INT, 
    armor_wgt DECIMAL(3,1), 
    level_requirement INT 
); 
 
CREATE TABLE weapon_junc ( 
    weapon_junc_id INT AUTO_INCREMENT PRIMARY KEY, 
    inv_id INT, 
    weapon_id INT 
); 
 
CREATE TABLE Weapons ( 
    weapon_id INT AUTO_INCREMENT PRIMARY KEY, 
    weapon_name VARCHAR(50), 
    weapon_dmg INT, 
    weapon_wgt DECIMAL(3,1), 
    level_requirement INT 
); 
 
CREATE TABLE spell_junc ( 
    spell_junc_id INT AUTO_INCREMENT PRIMARY KEY, 
    inv_id INT, 
    spell_id INT 
); 
 
CREATE TABLE Spells ( 
    spell_id INT AUTO_INCREMENT PRIMARY KEY, 
    spell_name VARCHAR(50), 
    spell_type_id INT, 
    mp_cost INT, 
    level_requirement INT 
); 
 
CREATE TABLE Spell_types ( 
    spell_type_id INT AUTO_INCREMENT PRIMARY KEY, 
    spell_type_name VARCHAR(50) 
); 
 
CREATE TABLE misc_junc ( 
    misc_junc_id INT AUTO_INCREMENT PRIMARY KEY, 
    inv_id INT, 
    misc_id INT 
); 
 
CREATE TABLE Miscellaneous ( 
    misc_id INT, 
    misc_name VARCHAR(50), 
    misc_desc VARCHAR(100), 
    amount INT 
);