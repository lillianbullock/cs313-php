-- ----------------------------------------------
-- ORIGINAL CREATES
-- ----------------------------------------------
CREATE TABLE goal
( goal_id	        serial		PRIMARY KEY
, name		        varchar(40)	NOT NULL
, entry_type		integer		NOT NULL
, frequency_type	integer		NOT NULL
, CONSTRAINT fk_entry_type      FOREIGN KEY (entry_type) 
    REFERENCES common_lookup(common_lookup_id)
, CONSTRAINT fk_frequency_type  FOREIGN KEY (frequency_type) 
    REFERENCES common_lookup(common_lookup_id)
);

CREATE TABLE access 
( access_id     serial		PRIMARY KEY
, person_id 	integer		NOT NULL
, goal_id	    integer		NOT NULL
, level_type	integer		NOT NULL
, CONSTRAINT fk_person_id   FOREIGN KEY (person_id)
    REFERENCES person(person_id)
, CONSTRAINT fk_goal_id     FOREIGN KEY (goal_id)
    REFERENCES goal(goal_id)
, CONSTRAINT fk_level_type  FOREIGN KEY (level_type)
    REFERENCES common_lookup(common_lookup_id)
);

-- ----------------------------------------------
-- ALTER GOAL
-- ----------------------------------------------
ALTER TABLE goal 
ADD COLUMN owner int 
CONSTRAINT fk_owner REFERENCES person(person_id);

-- There was only one goal so this is fine 
UPDATE goal SET owner = 1;

ALTER TABLE goal 
    ALTER COLUMN owner set NOT NULL;

-- ----------------------------------------------
-- ALTER ACCESS
-- ----------------------------------------------
ALTER TABLE access 
DROP COLUMN level_type;

UPDATE access
SET can_edit = false;

ALTER TABLE access
    ALTER COLUMN can_edit SET NOT NULL;