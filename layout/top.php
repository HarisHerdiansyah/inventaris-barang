<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="/inventaris-barang/styles/manage-items.css">
  <link rel="stylesheet" href="/inventaris-barang/styles/item-list.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Michroma&family=Sora:wght@100..800&display=swap');

    :root {
      --blue-primary: #003262;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: "Sora", system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    #navbar {
      background-color: var(--blue-primary);
    }

    .bg-blue-primary {
      background-color: var(--blue-primary);
    }

    #table-history tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    #table-history span.badge.approved {
      background-color: #86e49d;
      color: #006b21;
    }

    #table-history span.badge.pending {
      background-color: #ebc474;
      color: #7c5a00;
    }

    #table-history span.badge.rejected {
      background-color: #d893a3;
      color: #b30021;
    }

    section#card-container {
      background-color: rgba(245, 245, 245, 0.6);
      backdrop-filter: blur(16px);
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    }

    table#data-table {
      background-color: white;
      overflow: hidden;
    }

    table#data-table thead {
      background-color: #003262;
      color: white;
    }
  </style>
  <title>Document</title>
</head>

<body>