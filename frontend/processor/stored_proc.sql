CREATE TRIGGER `return_as_tester` AFTER INSERT ON `user_scores`
 FOR EACH ROW update users set had_taken = 0 where not exists (select user_id from user_scores where users.id = user_scores.user_id)

CREATE TRIGGER `return_as_user_tester` AFTER DELETE ON `user_scores`
 FOR EACH ROW UPDATE users SET had_taken = 0 where not exists (select user_id from user_scores where users.id = user_scores.user_id)
