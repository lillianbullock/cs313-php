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