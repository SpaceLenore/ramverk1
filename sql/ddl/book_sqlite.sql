--
-- Table Book
--
DROP TABLE IF EXISTS Book;
CREATE TABLE Book (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "title" TEXT NOT NULL,
    "author" TEXT NOT NULL,
    "cover" TEXT NOT NULL
);
