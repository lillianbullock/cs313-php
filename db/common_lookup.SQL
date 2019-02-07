-- ----------------------------------------------------------------------------
-- Create table
-- ----------------------------------------------------------------------------

CREATE TABLE common_lookup
( common_lookup_id	  serial		PRIMARY KEY
, table_name		  varchar(40)	NOT NULL
, column_name	      varchar(40)	NOT NULL
, value		          varchar(40)	NOT NULL  
);

-- ----------------------------------------------------------------------------
-- Inserts 
-- ----------------------------------------------------------------------------

-- access(level_type)
Insert into common_lookup 
( table_name
, column_name
, value)
VALUES
( 'ACCESS'
, 'LEVEL_TYPE'
, 'OWNER');

Insert into common_lookup 
( table_name
, column_name
, value)
VALUES
( 'ACCESS'
, 'LEVEL_TYPE'
, 'CAN_VIEW');

-- goal(frequency_type)

Insert into common_lookup 
( table_name
, column_name
, value)
VALUES
( 'GOAL'
, 'FREQUENCY_TYPE'
, 'DAILY');

Insert into common_lookup 
( table_name
, column_name
, value)
VALUES
( 'GOAL'
, 'FREQUENCY_TYPE'
, 'WEEKLY');

-- goal(type)

Insert into common_lookup 
( table_name
, column_name
, value)
VALUES
( 'GOAL'
, 'ENTRY_TYPE'
, 'CHECKBOX');

Insert into common_lookup 
( table_name
, column_name
, value)
VALUES
( 'GOAL'
, 'ENTRY_TYPE'
, 'NUMERICAL');

-- ----------------------------------------------------------------------------
-- added natural language column to make things easier
-- ----------------------------------------------------------------------------
ALTER table common_lookup
ADD column label varchar(40);

UPDATE common_lookup 
    SET label = 'Owner' 
    WHERE value = 'OWNER';

UPDATE common_lookup 
    SET label = 'Can View' 
    WHERE value = 'CAN_VIEW';

UPDATE common_lookup 
    SET label = 'Daily' 
    WHERE value = 'DAILY';

UPDATE common_lookup 
    SET label = 'Weekly' 
    WHERE value = 'WEEKLY';

UPDATE common_lookup 
    SET label = 'Checkbox' 
    WHERE value = 'CHECKBOX';

UPDATE common_lookup 
    SET label = 'Numerical' 
    WHERE value = 'NUMERICAL';

ALTER TABLE common_lookup 
    ALTER COLUMN label set NOT NULL;
