
/* modify database */

UPDATE tour_stop 
    SET tour_stop_location = 'Columbia, MO'
    WHERE tour_stop_location = 'Nashville, TN' IN (SELECT tour_stop_location
                                                   FROM tour_stop
                                                   WHERE tour_name = 'Cuz I Love You Too');
    
UPDATE artist_socials
    SET instagram = 'lizzo'
    WHERE instagram = 'lizzobeeating';
