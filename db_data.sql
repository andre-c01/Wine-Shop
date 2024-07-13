USE wine_shop;

INSERT INTO users () VALUES (default, "test", "test@test.test", "System32", default);
INSERT INTO users () VALUES (default, "tes2", "test@test.test", "System32", default);
INSERT INTO users () VALUES (default, "test3", "test@test.test", "System32", default);
INSERT INTO users () VALUES (default, "test4", "test@test.test", "System32", default);
INSERT INTO users () VALUES (default, "test5", "test@test.test", "System32", default);

INSERT INTO categories () VALUES (default, "vinho tinto");
INSERT INTO categories () VALUES (default, "vinho branco");
INSERT INTO categories () VALUES (default, "vinho verde");

INSERT INTO products () VALUES (default, "vinho tinto", "um vinho a maneira", 100, 20.22, "wine1.png", 1);
INSERT INTO products () VALUES (default, "vinho branco", "um vinho a outra", 70, 32.22, "wine1.png", 1);
INSERT INTO products () VALUES (default, "vinho verde", "um cheiro a maneira", 50, 100.22, "wine1.png", 2);
INSERT INTO products () VALUES (default, "vinho cinsento", "um vinho a oura", 10, 34.22, "wine1.png", 3);

INSERT INTO carts () VALUES (default, 1, 1, 10);
INSERT INTO carts () VALUES (default, 1, 2, 20);
INSERT INTO carts () VALUES (default, 1, 3, 30);
INSERT INTO carts () VALUES (default, 1, 4, 40);