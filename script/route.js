require("dotenv").config();
const express = require("express");
const bcrypt = require("bcrypt");
const { nanoid } = require("nanoid");
const mysql = require("mysql2/promise");
const router = express.Router();

// -------------------------------------------------------
// --------------- MySQL Connection ----------------------
// -------------------------------------------------------
function getDbTarget() {
  const mode = process.env.MODE;
  if (mode === "development") return process.env.DB_NAME_DEV;
  if (mode === "production") return process.env.DB_NAME_PROD;
  if (mode === "testing") return process.env.DB_NAME_TEST;
}

async function getConnection() {
  return await mysql.createConnection({
    host: process.env.DB_HOSTNAME,
    user: process.env.DB_USER,
    password: process.env.DB_PASSWORD,
    database: getDbTarget() || process.env.DB_NAME_DEV,
    port: process.env.DB_PORT,
  });
}
// -------------------------------------------------------
// -------------------------------------------------------

router.post("/register", async (req, res) => {
  try {
    const db = await getConnection();
    const { name, email, password } = req.body;
    const hashedPassword = bcrypt.hashSync(password, 10);

    const userRecord = {
      uid: nanoid(),
      nama: name,
      email: email,
      password: hashedPassword,
      role: "ADMIN",
    };

    await db.execute(
      `insert into users (id_user, nama, email, password, role) values (?, ?, ?, ?, ?)`,
      [
        userRecord.uid,
        userRecord.nama,
        userRecord.email,
        userRecord.password,
        userRecord.role,
      ]
    );

    res.status(201).json({
      message: "Admin berhasil didaftarkan",
      user: {
        id: userRecord.uid,
        name: userRecord.nama,
        email: userRecord.email,
        role: userRecord.role,
      },
    });
  } catch (error) {
    console.error("Kesalahan ketika registrasi:", error);
    res.status(500).json({ message: "Internal server error" });
  }
});

module.exports = router;
