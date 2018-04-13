SELECT last_name, first_name, date(birthdate) FROM user_card
WHERE DATE_FORMAT(birthdate, '%Y') = 1989 ORDER BY last_name;