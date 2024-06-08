<!DOCTYPE html>
<!-- Coding by CodingNepal || www.codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>e-PWS</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
   
    <style>
        /* Import Google font - Poppins */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        :root {
            --white-color: #fff;
            --blue-color: #4070f4;
            --grey-color: #707070;
            --grey-color-light: #aaa;
            --pink-color: #ff69b4;
            --pink2-color: #FFB6C1;
        }
        body {
            background-color: #e7f2fd;
            transition: all 0.5s ease;
        }
        body.dark {
            background-color: #333;
        }
        body.dark {
            --white-color: #333;
            --blue-color: #fff;
            --grey-color: #f2f2f2;
            --grey-color-light: #aaa;
        }

        /* navbar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            left: 0;
            background-color: var(--pink-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 30px;
            z-index: 1000;
            box-shadow: 0 0 2px var(--grey-color-light);
        }
        .logo_item {
            display: flex;
            align-items: center;
            column-gap: 10px;
            font-size: 22px;
            font-weight: 500;
            color: var(--blue-color);
        }
        .navbar img {
            width: 35px;
            height: 35px;
            object-fit: cover;
            border-radius: 50%;
            
        }
        .search_bar {
            height: 47px;
            max-width: 430px;
            width: 100%;
        }
        .search_bar input {
            height: 100%;
            width: 100%;
            border-radius: 25px;
            font-size: 18px;
            outline: none;
            background-color: var(--white-color);
            color: var(--grey-color);
            border: 1px solid var(--grey-color-light);
            padding: 0 20px;
        }
        .navbar_content {
            display: flex;
            align-items: center;
            column-gap: 25px;
        }
        .navbar_content i {
            cursor: pointer;
            font-size: 20px;
            color: var(--grey-color);
        }

        /* sidebar */
        .sidebar {
            background-color: var(--white-color);
            width: 260px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            padding: 80px 20px;
            z-index: 100;
            overflow-y: scroll;
            box-shadow: 0 0 1px var(--grey-color-light);
            transition: all 0.5s ease;
        }
        .sidebar.close {
            padding: 60px 0;
            width: 80px;
        }
        .sidebar::-webkit-scrollbar {
            display: none;
        }
        .menu_content {
            position: relative;
        }
        .menu_title {
            margin: 15px 0;
            padding: 0 20px;
            font-size: 18px;
        }
        .sidebar.close .menu_title {
            padding: 6px 30px;
        }
        .menu_title::before {
            color: var(--grey-color);
            white-space: nowrap;
        }
        .menu_dahsboard::before {
            content: "Dashboard";
        }
        .menu_editor::before {
            content: "Editor";
        }
        .menu_setting::before {
            content: "Setting";
        }
        .sidebar.close .menu_title::before {
            content: "";
            position: absolute;
            height: 2px;
            width: 18px;
            border-radius: 12px;
            background: var(--grey-color-light);
        }
        .menu_items {
            padding: 0;
            list-style: none;
        }
        .navlink_icon {
            position: relative;
            font-size: 22px;
            min-width: 50px;
            line-height: 40px;
            display: inline-block;
            text-align: center;
            border-radius: 6px;
        }
        .navlink_icon::before {
            content: "";
            position: absolute;
            height: 100%;
            width: calc(100% + 100px);
            left: -20px;
        }
        .navlink_icon:hover {
            background: var(--pink2-color);
        }
        .sidebar .nav_link {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 4px 15px;
            border-radius: 8px;
            text-decoration: none;
            color: var(--grey-color);
            white-space: nowrap;
        }
        .sidebar.close .navlink {
            display: none;
        }
        .nav_link:hover {
            color: var(--white-color);
            background: var(--pink2-color);
        }
        .sidebar.close .nav_link:hover {
            background: var(--white-color);
        }
        .submenu_item {
            cursor: pointer;
        }
        .submenu {
            display: none;
        }
        .submenu_item .arrow-left {
            position: absolute;
            right: 10px;
            display: inline-block;
            margin-right: auto;
        }
        .sidebar.close .submenu {
            display: none;
        }
        .show_submenu ~ .submenu {
            display: block;
        }
        .show_submenu .arrow-left {
            transform: rotate(90deg);
        }
        .submenu .sublink {
            padding: 15px 15px 15px 52px;
        }
        .bottom_content {
            position: fixed;
            bottom: 60px;
            left: 0;
            width: 260px;
            cursor: pointer;
            transition: all 0.5s ease;
        }
        .bottom {
            position: absolute;
            display: flex;
            align-items: center;
            left: 0;
            justify-content: space-around;
            padding: 18px 0;
            text-align: center;
            width: 100%;
            color: var(--grey-color);
            border-top: 1px solid var(--grey-color-light);
            background-color: var(--white-color);
        }
        .bottom i {
            font-size: 20px;
        }
        .bottom span {
            font-size: 18px;
        }
        .sidebar.close .bottom_content {
            width: 50px;
            left: 15px;
        }
        .sidebar.close .bottom span {
            display: none;
        }
        .sidebar.hoverable .collapse_sidebar {
            display: none;
        }
        #sidebarOpen {
            display: none;
        }
        @media screen and (max-width: 768px) {
            #sidebarOpen {
                font-size: 25px;
                display: block;
                margin-right: 10px;
                cursor: pointer;
                color: #7ac2e0;
            }
            .sidebar.close {
                left: -100%;
            }
            .search_bar {
                display: none;
            }
            .sidebar.close .bottom_content {
                left: -100%;
            }
        }

        /* Main content styles */
        .main-content {
            margin-top: 80px; /* Height of the navbar */
            margin-left: 280px; /* Width of the sidebar */
            padding: 40px;
            transition: all 0.5s ease;
        }

        /* Adjust main content when sidebar is closed */
        .sidebar.close ~ .main-content {
            margin-left: 80px; /* Adjust to the width of the closed sidebar */
        }
        @media screen and (max-width: 768px) {
            .main-content {
                margin-left: 0; /* Remove margin for small screens */
                margin-top: 60px; /* Adjust for smaller navbar height */
            }
            .sidebar.close ~ .main-content {
                margin-left: 0; /* No additional margin on small screens */
            }
        }
        .logout-button {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 50px;
            font-size: 18px;
            color: var(--grey-color);
            border: 1px solid var(--grey-color-light);
            background-color: var(--white-color);
            text-align: center;
            border-radius: 8px;
            margin: 10px 20px;
            text-decoration: none;
            transition: background 0.3s, color 0.3s;
            top: 500px;
            position:absolute;
        }
        .logout-button:hover {
            color: var(--white-color);
            background-color: var(--pink2-color);
        }
        .sidebar.close .logout-button span {
            display: none;
        }
        .sidebar.close .logout-button {
            justify-content: center;
            padding: 10px;
        }
        .welcome_text {
           display: inline-block;
           vertical-align: middle;
        }
        .pink-color {
            color: var(--pink-color);
        }

    </style>
  </head>
  <body>

    <!-- navbar -->
    <nav class="navbar">
      <div class="logo_item">
        <i class="bx bx-menu" id="sidebarOpen"></i>
        <img src="{{ asset('logo.png') }}" alt="">
        e-Platinum World 
      </div>

    

      <div class="navbar_content">
        <i class="bi bi-grid"></i>
        <i class='bx bx-sun' id="darkLight"></i>
        <i class='bx bx-bell' ></i>
        <img src="{{ asset('logo.png') }}" alt="" class="profile" />
      </div>
    </nav>

    <!-- sidebar -->
    <nav class="sidebar">
      <div class="menu_content">
      <h1 style="font-size: 24px;">Platinum</h1>
        <ul class="menu_items">
        <div class="menu_title menu_dashboard"></div>
          <!-- duplicate or remove this li tag if you want to add or remove navlink with submenu -->
          <!-- start -->
          <li class="item">
            <div href="#" class="nav_link submenu_item">
              <span class="navlink_icon">
              <i class='bx bxs-user'></i>
              </span>
              <span class="navlink">Profile</span>
              <i class="bx bx-chevron-right arrow-left"></i>
            </div>

            <ul class="menu_items submenu">
              <a href="{{ route('platinum.profile') }}" class="nav_link sublink">My Profile</a>
              <a href="#" class="nav_link sublink">Platinum Profile</a>
            </ul>
          </li>
          <!-- end -->

          <!-- duplicate this li tag if you want to add or remove  navlink with submenu -->
          <!-- start -->
          <li class="item">
            <div href="#" class="nav_link submenu_item">
              <span class="navlink_icon">
              <i class='bx bx-book-reader'></i>
              </span>
              <span class="navlink">Expert</span>
              <i class="bx bx-chevron-right arrow-left"></i>
            </div>

            <ul class="menu_items submenu">
              <!--<a href="#" class="nav_link sublink">Add New Expert</a> -->
              <a href="{{ route('experts.index') }}" class="nav_link sublink">My Expert</a>
              <a href="#" class="nav_link sublink">Expert List</a>
            </ul>
          </li>
          <!-- end -->
        
        <ul class="menu_items">
          <!--<div class="menu_title menu_editor"></div>-->
          <!-- duplicate these li tag if you want to add or remove navlink only -->
          <!-- Start -->
          <li class="item">
            <a href="{{ route('Publication.landingpublication') }}" class="nav_link">
              <span class="navlink_icon">
              <i class='bx bx-book'></i>
              </span>
              <span class="navlink">Publications</span>
            </a>
          </li>
          <!-- End -->
        </ul>

        <!-- Sidebar Open / Close -->
        <div class="sidebar-bottom-container">
      <a href="{{ route('logout') }}" class="logout-button">
        <i class="lni lni-exit"></i>
        <span>Logout</span>
      </a>
      <div class="bottom_content">
        <div class="bottom expand_sidebar">
          <span> Expand</span>
          <i class='bx bx-log-in' ></i>
        </div>
        <div class="bottom collapse_sidebar">
          <span> Collapse</span>
          <i class='bx bx-log-out'></i>
        </div>
      </div>
    </div>
  </div>
</nav>
    <div class="main-content">
         @yield('platinum')
    </div>
    <!-- JavaScript -->
    <script>
      const body = document.querySelector("body");
const darkLight = document.querySelector("#darkLight");
const sidebar = document.querySelector(".sidebar");
const submenuItems = document.querySelectorAll(".submenu_item");
const sidebarOpen = document.querySelector("#sidebarOpen");
const sidebarClose = document.querySelector(".collapse_sidebar");
const sidebarExpand = document.querySelector(".expand_sidebar");
sidebarOpen.addEventListener("click", () => sidebar.classList.toggle("close"));

sidebarClose.addEventListener("click", () => {
  sidebar.classList.add("close", "hoverable");
});
sidebarExpand.addEventListener("click", () => {
  sidebar.classList.remove("close", "hoverable");
});

sidebar.addEventListener("mouseenter", () => {
  if (sidebar.classList.contains("hoverable")) {
    sidebar.classList.remove("close");
  }
});
sidebar.addEventListener("mouseleave", () => {
  if (sidebar.classList.contains("hoverable")) {
    sidebar.classList.add("close");
  }
});

darkLight.addEventListener("click", () => {
  body.classList.toggle("dark");
  if (body.classList.contains("dark")) {
    document.setI;
    darkLight.classList.replace("bx-sun", "bx-moon");
  } else {
    darkLight.classList.replace("bx-moon", "bx-sun");
  }
});

submenuItems.forEach((item, index) => {
  item.addEventListener("click", () => {
    item.classList.toggle("show_submenu");
    submenuItems.forEach((item2, index2) => {
      if (index !== index2) {
        item2.classList.remove("show_submenu");
      }
    });
  });
});

if (window.innerWidth < 768) {
  sidebar.classList.add("close");
} else {
  sidebar.classList.remove("close");
}



    </script>
  </body>
</html>
