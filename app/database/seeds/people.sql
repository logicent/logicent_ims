DROP VIEW IF EXISTS `people`;
CREATE VIEW `people` AS
SELECT
  `auth`.`id` AS `id`,
  `auth`.`username` AS `username`,
  `auth`.`email` AS `email`,
  `auth`.`status` AS `status`,
  `auth`.`created_at` AS `created_at`,
  `auth`.`updated_at` AS `updated_at`,
  `user`.`auth_id` AS `auth_id`,
  `user`.`firstname` AS `firstname`,
  `user`.`surname` AS `surname`,
  `user`.`sex` AS `sex`,
  `user`.`mobile_no` AS `mobile_no`,
  `user`.`avatar` AS `avatar`,
  `user`.`doc_status` AS `doc_status`
FROM
  (
    `auth`
    LEFT JOIN `user` ON(
      (
        convert(`user`.`auth_id` USING utf8) = convert(`auth`.`id` USING utf8)
      )
    )
  )