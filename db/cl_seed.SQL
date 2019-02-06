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


INSERT INTO goal
( name
, entry_type
, frequency_type)
VALUES
( 'Scripture Study'
, (SELECT common_lookup_id from common_lookup 
   where column_name = 'ENTRY_TYPE'
   AND   table_name = 'GOAL'
   AND  value = 'CHECKBOX')
, (SELECT common_lookup_id from common_lookup 
   where column_name = 'FREQUENCY_TYPE'
   AND   table_name = 'GOAL'
   AND  value = 'DAILY')
 );
