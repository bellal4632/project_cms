
Admin Login:
email: admin@mail.com
pass:123


https://github.com/asamamun/poly4cms

ALTER TABLE articles
ADD FOREIGN KEY (category_id) REFERENCES categories(id);

ALTER TABLE articles
ADD FOREIGN KEY (user_id) REFERENCES users(id);