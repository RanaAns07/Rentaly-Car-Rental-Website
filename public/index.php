<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rentaly</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" />
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <style>
    body {
    padding: 0;
    margin: 0;
    font-family: "Poppins", sans-serif; /* Modern font for professional look */
    background-color: #f9fafb; /* Light background for better readability */
    color: #333;
    box-sizing: border-box;
  }
  
  .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 40px;
    background: linear-gradient(90deg, #1e3a8a, black); /* Gradient for a premium look */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 0;
    z-index: 1000;
  }
  
  .navbar .logo p {
    
    color: black; 
    font-variant: normal;
    font-size:larger;
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-weight: 1000;
    padding: 0px;
    margin: 0px;
  }
  
  .navbar .nav-links {
    display: flex;
    gap: 20px;
  }
  
  .navbar a {
    color: #f3f4f6; /* Soft white for links */
    text-decoration: none;
    font-weight: 500;
    font-size: 16px;
    padding: 8px 12px;
    border-radius: 5px;
    transition: all 0.3s ease;
  }
  
  .navbar a:hover {
    background-color: rgba(255, 255, 255, 0.2); /* Subtle hover effect */
    color: #fff;
  }
  
  .navbar .sign-in {
    background-color: #10b981; /* Vibrant green button */
    color: #fff;
    padding: 10px 25px;
    border-radius: 25px;
    font-size: 16px;
    font-weight: 600;
    text-transform: uppercase;
    box-shadow: 0 4px 8px rgba(16, 185, 129, 0.4);
    transition: all 0.3s ease;
  }
  
  .navbar .sign-in:hover {
    background-color: black; /* Slightly darker green on hover */
    box-shadow: 0 6px 12px rgba(5, 150, 105, 0.5);
    transform: translateY(-2px);
  }
  
  @media (max-width: 768px) {
    .navbar {
      padding: 10px 20px;
    }
  
    .navbar .nav-links {
      display: none; /* Navigation links hidden on mobile */
    }
  
    .navbar .menu-toggle {
      display: block;
      font-size: 24px;
      color: #f3f4f6;
      cursor: pointer;
    }
  }
  
  @media (min-width: 769px) {
    .navbar .menu-toggle {
      display: none;
    }
  }

/* HERO SECTION */
.hero {
  position: relative;
  text-align: center;
  color: #fff;
  background-image: url("lamo urus.jpeg"); /* Remove "public/" */
  background-size: cover;
  background-position: center;
  height: 600px;
  display: flex;
  justify-content: center;
  align-items: center;
  box-shadow: inset 0 0 50px rgba(0, 0, 0, 0.7);
}
  
  .hero .text {
    background: rgba(0, 0, 0, 0.7); /* Darker overlay for improved contrast */
    padding: 30px 40px;
    border-radius: 15px; /* Smoother rounded corners */
    animation: fadeIn 1.5s ease-in-out; /* Subtle fade-in effect */
  }
  
  .hero .text h1 {
    font-size: 60px;
    font-weight: 700; /* Bold and impactful title */
    margin: 0;
    line-height: 1.2;
    text-transform: uppercase; /* Professional text styling */
  }
  
  .hero .text p {
    font-size: 22px;
    margin: 20px 0;
    font-weight: 300;
    color: #d1d5db; /* Lighter text for a polished look */
  }
  
  .hero .text .btn {
    background: linear-gradient(90deg, #10b981, #059669); /* Gradient button */
    padding: 12px 30px;
    border-radius: 30px; /* Pill-shaped button */
    text-decoration: none;
    color: #fff;
    font-size: 18px;
    font-weight: 600;
    text-transform: uppercase;
    transition: all 0.3s ease;
    box-shadow: 0 8px 15px rgba(16, 185, 129, 0.4); /* Elevated button */
  }
  
  .hero .text .btn:hover {
    background: linear-gradient(90deg, #059669, #065f46);
    box-shadow: 0 10px 20px rgba(16, 185, 129, 0.6);
    transform: translateY(-3px);
  }
  
  /* Animation for hero section fade-in */
  @keyframes fadeIn {
    0% {
      opacity: 0;
      transform: translateY(20px);
    }
    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }
  
  /* FLEET SECTION */
  .fleet {
    text-align: center;
    padding: 60px 20px;
    background-color: #f9fafb; /* Light, clean background */
  }
  
  .fleet h2 {
    font-size: 40px;
    font-weight: 700;
    margin-bottom: 15px;
    color: #1e293b; /* Dark, modern headline color */
  }
  
  .fleet p {
    font-size: 20px;
    font-weight: 300;
    margin-bottom: 50px;
    color: #64748b; /* Soft, professional text color */
  }
  
  .fleet .cards {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px; /* Added spacing between cards */
  }
  
  .fleet .card {
    background: #ffffff;
    border-radius: 15px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
    width: 300px; /* Standard card width */
    padding: 20px;
    text-align: left;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  
  .fleet .card:hover {
    transform: translateY(-10px); /* Lift effect on hover */
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2); /* Elevated shadow on hover */
  }
  
  .fleet .card h3 {
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 10px;
    color: #1e293b; /* Dark card title */
  }
  
  .fleet .card p {
    font-size: 16px;
    font-weight: 300;
    color: #475569; /* Subtle card text */
  }
  
  .fleet .card .btn {
  
    background: #2563eb; /* Professional blue button */
    padding: 10px 20px;
    border-radius: 30px;
    text-decoration: none;
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
    margin-top: 20px;
    transition: all 0.3s ease;
  }
  
  

  .fleet .card {
    background-color: #ffffff; /* Clean and professional white background */
    border-radius: 15px; /* Smooth rounded corners */
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1); /* Subtle elevation */
    margin: 20px;
    width: 320px; /* Slightly wider for better content spacing */
    padding: 20px;
    text-align: left;
    color: #1a202c; /* Darker text for better readability */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  
  .fleet .card:hover {
    transform: translateY(-10px); /* Lift effect for interactivity */
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15); /* Enhanced shadow on hover */
  }
  
  .fleet .card img {
    width: 100%;
    border-radius: 15px 15px 0 0; /* Rounded corners only at the top */
    margin-bottom: 15px;
  }
  
  .fleet .card h3 {
    font-size: 22px;
    font-weight: 600; /* Bold and clean title */
    color: #2c3e50; /* Deep navy tone for modern design */
    margin: 15px 0 10px;
  }
  
  .fleet .card p {
    font-size: 16px;
    font-weight: 400;
    margin: 5px 0 15px;
    color: #4a5568; /* Neutral gray for secondary text */
  }
  
  .fleet .card .price {
    font-size: 22px;
    font-weight: 700; /* Bold price for prominence */
    color: #10b981; /* Bright green for an inviting call-to-action */
    margin: 10px 0;
  }
  
  .fleet .card .btn {
    background: linear-gradient(90deg, #10b981, #059669); /* Sleek green gradient */
    padding: 12px 20px;
    border-radius: 30px; /* Pill-shaped button for a modern look */
    text-decoration: none;
    color: #ffffff;
    font-size: 16px;
    font-weight: 600;
    text-transform: uppercase;
    display: inline-block;
    transition:  0.3s ease, transform 0.3s ease;
    text-align: center;
  }
  
  .fleet .card .btn:hover {
    background: linear-gradient(90deg, #059669, black); /* Slightly darker hover effect */
    transform: translateY(-3px); /* Lift effect on hover */
  }
  
  @media (max-width: 768px) {
    .navbar {
      flex-direction: column;
      align-items: center;
    }
  
    .fleet .cards {
      flex-direction: column;
      align-items: center;
    }
  
    .fleet .card {
      width: 90%; /* Full width for smaller devices */
      margin: 20px 0;
    }
  }
  
/* Container Styling */
.container {
    display: flex;
    flex-wrap: wrap;
    padding: 20px;
    max-width: 1200px;
    margin: auto;
    gap: 20px; /* Added consistent spacing between elements */
  }
  
  /* Sidebar Styling */
  .sidebar {
    flex: 1;
    max-width: 300px;
    padding: 20px;
    background-color: #1e1e1e; /* Darker background for better contrast */
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Subtle shadow for depth */
    margin-bottom: 20px;
    color: #fff;
  }
  
  .sidebar h3 {
    margin-top: 0;
    font-size: 20px;
    border-bottom: 2px solid #28a745; /* Green underline for distinction */
    padding-bottom: 5px;
  }
  
  .sidebar label {
    display: block;
    margin-bottom: 15px;
    font-size: 14px;
    color: #d1d1d1;
  }
  
  .sidebar input {
    margin-right: 10px;
  }
  
  /* Main Content Styling */
  .main-content {
    flex: 3;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
  }
  
  /* Card Styling */
  .card {
    background-color: #2a2a2a; /* Sleek dark card design */
    border-radius: 15px;
    padding: 20px;
    width: calc(33.333% - 20px);
    box-sizing: border-box;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Subtle elevation */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  
  .card:hover {
    transform: translateY(-5px); /* Lift effect on hover */
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); /* Enhanced shadow on hover */
  }
  
  .card img {
    width: 100%;
    border-radius: 10px;
    margin-bottom: 15px;
  }
  
  .card h4 {
    margin: 10px 0;
    font-size: 18px;
    color: #fff;
  }
  
  .card .details {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
  }
  
  .card .details span {
    display: flex;
    align-items: center;
    font-size: 14px;
    color: #ccc;
  }
  
  .card .details span i {
    margin-right: 5px;
    color: #28a745;
  }
  
  .card .price {
    font-size: 1.2em;
    font-weight: bold;
    color: #28a745;
    margin-bottom: 10px;
  }
  
  .card .btn {
    background-color: #28a745;
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 30px; /* Pill-shaped button */
    cursor: pointer;
    text-align: center;
    font-size: 14px;
    font-weight: bold;
    text-transform: uppercase;
    display: inline-block;
    transition: 0.3s ease, transform 0.3s ease;
  }
  
  .card .btn:hover {
    background-color: #218838; /* Slightly darker green on hover */
    transform: translateY(-3px); /* Lift effect on hover */
  }
  
  /* Responsive Styling */
  @media (max-width: 768px) {
    .card {
      width: calc(50% - 20px);
    }
  }
  
  @media (max-width: 480px) {
    .card {
      width: 100%;
    }
  
    .sidebar {
      max-width: 100%;
      margin-right: 0;
      margin-bottom: 20px;
    }
  }
  
  /* Main Image and Details Section */
  .main-image {
    flex: 1 1 60%;
    padding: 10px;
  }
  
  .main-image img {
    width: 100%;
    border-radius: 10px; /* Rounded corners for main image */
    height: auto;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Shadow for a polished look */
  }
  
  .thumbnails {
    display: flex;
    justify-content: space-between;
    gap: 10px;
    padding: 10px;
  }
  
  .thumbnails img {
    width: 18%;
    height: auto;
    cursor: pointer;
    border-radius: 5px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  
  .thumbnails img:hover {
    transform: scale(1.05); /* Slight zoom-in on hover */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  }
  
  /* Details Section */
  .details {
    flex: 1 1 40%;
    padding: 10px;
    background-color: #1e1e1e;
    border-radius: 10px;
    color: #fff;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  }
  
  .details h1 {
    font-size: 24px;
    margin-bottom: 15px;
  }
  
  .details p {
    font-size: 14px;
    margin-bottom: 20px;
    color: #d1d1d1;
  }
  
  .specifications,
  .features,
  .booking,
  .share {
    margin-bottom: 20px;
  }
  
  .specifications h2,
  .features h2,
  .booking h2,
  .share h2 {
    font-size: 18px;
    margin-bottom: 10px;
    border-bottom: 2px solid #28a745; /* Green underline */
    padding-bottom: 5px;
  }
  
  .specifications ul,
  .features ul {
    list-style: none;
    padding: 0;
  }
  
  .specifications ul li,
  .features ul li {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 14px;
    color: #d1d1d1;
  }
  
  .features ul li i {
    color: #28a745; /* Highlighted green icons */
    margin-right: 10px;
  }
/* Container Styling */
.container {
    display: flex;
    flex-wrap: wrap;
    padding: 20px;
    max-width: 1200px;
    margin: auto;
    gap: 20px; /* Added consistent spacing between elements */
  }
  
  /* Sidebar Styling */
  .sidebar {
    flex: 1;
    max-width: 300px;
    padding: 20px;
    background-color: #1e1e1e; /* Darker background for better contrast */
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Subtle shadow for depth */
    margin-bottom: 20px;
    color: #fff;
  }
  
  .sidebar h3 {
    margin-top: 0;
    font-size: 20px;
    border-bottom: 2px solid #28a745; /* Green underline for distinction */
    padding-bottom: 5px;
  }
  
  .sidebar label {
    display: block;
    margin-bottom: 15px;
    font-size: 14px;
    color: #d1d1d1;
  }
  
  .sidebar input {
    margin-right: 10px;
  }
  
  /* Main Content Styling */
  .main-content {
    flex: 3;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
  }
  
  /* Card Styling */
  .card {
    background-color: #2a2a2a; /* Sleek dark card design */
    border-radius: 15px;
    padding: 20px;
    width: calc(33.333% - 20px);
    box-sizing: border-box;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Subtle elevation */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  
  .card:hover {
    transform: translateY(-5px); /* Lift effect on hover */
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); /* Enhanced shadow on hover */
  }
  
  .card img {
    width: 100%;
    border-radius: 10px;
    margin-bottom: 15px;
  }
  
  .card h4 {
    margin: 10px 0;
    font-size: 18px;
    color: #fff;
  }
  
  .card .details {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
  }
  
  .card .details span {
    display: flex;
    align-items: center;
    font-size: 14px;
    color: #ccc;
  }
  
  .card .details span i {
    margin-right: 5px;
    color: #28a745;
  }
  
  .card .price {
    font-size: 1.2em;
    font-weight: bold;
    color: #28a745;
    margin-bottom: 10px;
  }
  
  .card .btn {
    background-color: #28a745;
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 30px; /* Pill-shaped button */
    cursor: pointer;
    text-align: center;
    font-size: 14px;
    font-weight: bold;
    text-transform: uppercase;
    display: inline-block;
    transition:  0.3s ease, transform 0.3s ease;
  }
  
  .card .btn:hover {
    transition: 1s;
    background: linear-gradient(45deg, blue, black); /* Slightly darker green on hover */
    transform: translateY(-3px); /* Lift effect on hover */
  }
  
  /* Responsive Styling */
  @media (max-width: 768px) {
    .card {
      width: calc(50% - 20px);
    }
  }
  
  @media (max-width: 480px) {
    .card {
      width: 100%;
    }
  
    .sidebar {
      max-width: 100%;
      margin-right: 0;
      margin-bottom: 20px;
    }
  }
  
  /* Main Image and Details Section */
  .main-image {
    flex: 1 1 60%;
    padding: 10px;
  }
  
  .main-image img {
    width: 100%;
    border-radius: 10px; /* Rounded corners for main image */
    height: auto;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Shadow for a polished look */
  }
  
  .thumbnails {
    display: flex;
    justify-content: space-between;
    gap: 10px;
    padding: 10px;
  }
  
  .thumbnails img {
    width: 18%;
    height: auto;
    cursor: pointer;
    border-radius: 5px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  
  .thumbnails img:hover {
    transform: scale(1.05); /* Slight zoom-in on hover */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  }
  
  /* Details Section */
  .details {
    flex: 1 1 40%;
    padding: 10px;
    background-color: #1e1e1e;
    border-radius: 10px;
    color: #fff;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  }
  
  .details h1 {
    font-size: 24px;
    margin-bottom: 15px;
  }
  
  .details p {
    font-size: 14px;
    margin-bottom: 20px;
    color: #d1d1d1;
  }
  
  .specifications,
  .features,
  .booking,
  .share {
    margin-bottom: 20px;
  }
  
  .specifications h2,
  .features h2,
  .booking h2,
  .share h2 {
    font-size: 18px;
    margin-bottom: 10px;
    border-bottom: 2px solid #28a745; /* Green underline */
    padding-bottom: 5px;
  }
  
  .specifications ul,
  .features ul {
    list-style: none;
    padding: 0;
  }
  
  .specifications ul li,
  .features ul li {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
    font-size: 14px;
    color: #d1d1d1;
  }
  
  .features ul li i {
    color: #28a745; /* Highlighted green icons */
    margin-right: 10px;
  }
/* Global Styles */
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color: #f4f4f4;
  }
  
  /* Offer Section */
  .offer-section {
    
    color: white;
    padding: 60px 20px;
    text-align: center;
    border-bottom: 5px solid #4caf50;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  }
  .offer-section h2 {
    font-size: 3em;
    margin-bottom: 20px;
    letter-spacing: 1px;
  }
  .offer-section p {
    max-width: 650px;
    margin: 0 auto 30px;
    font-size: 1.1em;
    line-height: 1.6;
  }
  
  /* Stats Section */
  .stats {
    display: flex;
    justify-content: space-around;
    margin-top: 30px;
    flex-wrap: wrap;
  }
  .stats div {
    background-color: #1e1e1e;
    padding: 20px;
    border-radius: 10px;
    width: 21%;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s, box-shadow 0.3s;
}
  .stats div:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
  }
  .stats div h3 {
    margin: 0;
    font-size: 1.6em;
    color: #4caf50;
  }
  .stats div p {
    font-size: 1.1em;
    margin: 10px 0 0;
    color: #ddd;
  }
  
  /* Header */
  .header {
    position: relative;
    text-align: center;
    color: black;
    background-color: grey;
  }
  .header img {
    width: 100%;
    height: auto;
  }
  .header h1 {
    position: absolute;
    top: 30%;
    left: 50%;
    transform: translate(-50%, -23%);
    font-size: 3.5em;
    margin: 0;
    font-weight: bold;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
  }
  
  /* Content Section */
  .content {
    padding: 4em 20px;
    text-align: center;
    background-color: #fff;
  }
  .content h2 {
    font-size: 2.5em;
    margin-bottom: 1.5em;
    font-weight: bold;
  }
  .content p {
    font-size: 1.1em;
    line-height: 1.7;
    margin-bottom: 2.5em;
    color: #555;
  }
  
  /* Board Section */
  .board {
    text-align: center;
    margin-bottom: 3em;
  }
  .board h2 {
    font-size: 2.5em;
    margin-bottom: 1.5em;
    font-weight: bold;
  }
  .board .members {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
  }
  .board .member {
    width: 25%;
    text-align: center;
    margin-bottom: 2em;
  }
  .board .member img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 1s;
  }
  .board .member img:hover {
    transform: scale(1.05);
  }
  .board .member h3 {
    font-size: 1.3em;
    margin: 10px 0;
    font-weight: bold;
  }
  .board .member .social a {
    color: #4caf50;
    margin: 0 0.5em;
    font-size: 1.3em;
    transition: color 0.3s;
  }
  .board .member .social a:hover {
    color: #333;
  }
  
  /* Media Queries */
  @media (max-width: 768px) {
    .stats {
      flex-direction: column;
      align-items: center;
    }
    .stats div {
      width: 80%;
      margin-bottom: 1em;
    }
    .board .members {
      flex-direction: column;
      align-items: center;
    }
    .board .member {
      width: 80%;
    }
  }
  
  /* CTA Buttons */
  .button {
    display: inline-block;
    background-color: #4caf50;
    color: white;
    padding: 15px 30px;
    font-size: 1.2em;
    font-weight: bold;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s;
  }
  .button:hover {
    background-color: #45a049;
  }

  footer {
            margin-top: 3rem;
            padding: 1rem;
            width: 100%;
            background: rgba(0, 0, 0, 0.9);
            text-align: center;
            color: #aaa;
            font-size: 0.875rem;
        }
</style>
</head>
<body>
    
<div class="navbar">
        <div class="logo">
            <p style="color: white;"> RENTALY </p>
        </div>
        <div class="nav-links">
            <a href="#hero1">Home</a>
            <a href="#fleet">Cars</a>
            <a href="booking.php">Booking</a>
            <a href="#">My Account</a>
            <a href="#">Pages</a>
            <a href="#">News</a>
            <a href="#">Elements</a>
        </div>
        <a href="http://localhost/car-website/admin/" class="sign-in">Admin Login</a>
    </div>
    <div class="hero" style="background-image: url('nav_img.jpeg');">
        <div class="text">
            <h1>Premium Cars</h1>
            <p>Discover the world in unparalleled comfort and style</p>
            <a href="#fleet" class="btn">Discover</a>
        </div>
    </div>  
    
    <div class="fleet" id="fleet">
    <h2>Our Vehicle Fleet</h2>
    <p>Driving your dreams to reality with an exquisite fleet of versatile vehicles for unforgettable journeys.</p>
    <div class="cards" id="car-container">
        <!-- Car data will be dynamically inserted here -->
    </div>
</div>

<script>
    function fetchCars() {
        fetch("/car-website/admin/api/get.php") // Fetch data from API
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    const carContainer = document.getElementById("car-container");
                    carContainer.innerHTML = ""; // Clear existing content
                    
                    data.data.slice(0, 3).forEach(car => { // Limit to 3 cars
                        const carCard = document.createElement("div");
                        carCard.classList.add("card");
                        
                      carCard.innerHTML = `
                      <img src="${car.main_image}" alt="${car.model}" />
                      <h3>${car.model}</h3>
                      <p><i class="fas fa-car"></i> ${car.body_type}</p>
                      <p><i class="fas fa-users"></i> ${car.seats}</p>
                      <p class="price">Rs ${car.daily_rate}</p>
                      <a href="booking.php" class="btn rent-now"
                          data-car-id="${car.car_id}"
                          data-car-model="${car.model}"
                          data-car-rate="${car.daily_rate}">
                          Rent Now
                      </a>
                  `;


                        carContainer.appendChild(carCard);
                    });
                } else {
                    console.error("Error fetching car data:", data.message);
                }
            })
            .catch(error => console.error("Error fetching car data:", error));
    }

    document.addEventListener("DOMContentLoaded", fetchCars);
</script>

<main style="display: flex; align-items: center; justify-content: space-between; text-align: left; 
             background-color: #111827; color: #e5e7eb; padding: 60px; font-family: 'Roboto', sans-serif; 
             border-radius: 12px; box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.7); gap: 40px; width: 90%; margin: auto;">

    <!-- Left Content -->
    <div style="width: 50%;">
        <h1 style="font-size: 48px; font-weight: 700; line-height: 1.2; margin-bottom: 20px;">
            Discover Your <span style="color: #16a34a;">Dream Car</span> Today!
        </h1>
        <p style="font-size: 18px; color: #9ca3af; margin-bottom: 30px;">
            Explore our collection of premium luxury cars, designed for performance and elegance. Enjoy exclusive deals and unmatched quality that define your driving experience.
        </p>

        <!-- Stats Cards -->
        <div style="display: flex; justify-content: space-between; width: 100%; margin-bottom: 30px;">
            <div style="background: #1f2937; padding: 20px; border-radius: 12px; text-align: center; width: 30%; 
                        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);">
                <div style="font-size: 32px; font-weight: bold; color: #16a34a;">500+</div>
                <div style="color: #9ca3af;">Luxury Models</div>
            </div>
            <div style="background: #1f2937; padding: 20px; border-radius: 12px; text-align: center; width: 30%; 
                        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);">
                <div style="font-size: 32px; font-weight: bold; color: #16a34a;">10K+</div>
                <div style="color: #9ca3af;">Satisfied Customers</div>
            </div>
            <div style="background: #1f2937; padding: 20px; border-radius: 12px; text-align: center; width: 30%; 
                        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);">
                <div style="font-size: 32px; font-weight: bold; color: #16a34a;">100+</div>
                <div style="color: #9ca3af;">Dealerships Worldwide</div>
            </div>
        </div>

        <!-- Button -->
        <a href="explore.php"><button style="padding: 14px 36px; background: linear-gradient(135deg, #16a34a, #15803d); color: white; font-weight: bold; 
                       border-radius: 999px; box-shadow: 0px 4px 15px rgba(16, 185, 129, 0.5); border: none; 
                       cursor: pointer; transition: all 0.3s ease; font-size: 18px;" 
                onmouseover="this.style.background='linear-gradient(135deg, #15803d, #166534)'" 
                onmouseout="this.style.background='linear-gradient(135deg, #16a34a, #15803d)'">
            Explore Models
        </button></a>
    </div>

    <!-- Right Image -->
    <div style="width: 50%; display: flex; justify-content: center;">
        <img src="https://storage.googleapis.com/a1aa/image/GGUxzzD-YHqWe2fh61Gv5XN-mYe59UNKJmk53nit1x8.jpg" 
             alt="A black luxury car" 
             style="width: 100%; max-width: 600px; border-radius: 12px; 
                    box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.8);">
    </div>

</main>

<div class="container" style="max-width: 1200px; margin: 0 auto; padding: 20px;">
    <div class="main-image" style="position: relative; max-width: 90%; margin: 0 auto 30px auto;">
        <img alt="Main image of a blue BMW M2 2020 car" id="mainImage" src="bmw m2 2020 1.jpg" 
             style="width: 90%; height: auto; border-radius: 10px; display: block; margin: 0 auto;" />
        <div class="thumbnails" style="display: flex; justify-content: center; gap: 10px; margin-top: 15px;">
            <img alt="Thumbnail image 1 of BMW M2 2020" onclick="changeImage(this.src)" src="bmw m2 2020 1.jpg" 
                 style="width: 80px; height: 60px; object-fit: cover; border-radius: 5px; cursor: pointer;" />
            <img alt="Thumbnail image 2 of BMW M2 2020" onclick="changeImage(this.src)" src="bmw m2 2020 2.webp" 
                 style="width: 80px; height: 60px; object-fit: cover; border-radius: 5px; cursor: pointer;" />
            <img alt="Thumbnail image 3 of BMW M2 2020" onclick="changeImage(this.src)" src="bmw m2 2020 3.jpg" 
                 style="width: 80px; height: 60px; object-fit: cover; border-radius: 5px; cursor: pointer;" />
            <img alt="Thumbnail image 4 of BMW M2 2020" onclick="changeImage(this.src)" src="bmw 2020 m2 4.jpg" 
                 style="width: 80px; height: 60px; object-fit: cover; border-radius: 5px; cursor: pointer;" />
            <img alt="Thumbnail image 5 of BMW M2 2020" onclick="changeImage(this.src)" src="bmw m2 2020 m5.jpg" 
                 style="width: 80px; height: 60px; object-fit: cover; border-radius: 5px; cursor: pointer;" />
        </div>
    </div>
</div>


<style>
    #mainImage {
        transition: opacity 0.8s ease-in-out;
    }
</style>

<script>
    let images = [
        "bmw m2 2020 1.jpg",
        "bmw m2 2020 2.webp",
        "bmw m2 2020 3.jpg",
        "bmw 2020 m2 4.jpg",
        "bmw m2 2020 m5.jpg"
    ];
    
    let currentIndex = 0;
    let isManualChange = false;

    function changeImage(src) {
        let mainImage = document.getElementById('mainImage');
        mainImage.style.opacity = "0"; // Start fading out

        setTimeout(() => {
            mainImage.src = src;
            mainImage.style.opacity = "1"; // Fade in new image
        }, 300); // Delay before changing image

        isManualChange = true;
        setTimeout(() => isManualChange = false, 5000); // Reset manual change after 5 sec
    }

    function autoChangeImage() {
        if (!isManualChange) {
            let mainImage = document.getElementById('mainImage');
            mainImage.style.opacity = "0"; // Start fade-out effect

            setTimeout(() => {
                currentIndex = (currentIndex + 1) % images.length;
                mainImage.src = images[currentIndex];
                mainImage.style.opacity = "1"; // Fade in new image
            }, 300); // Delay before changing the image
        }
    }

    setInterval(autoChangeImage, 3000);
</script>


<header class="header" id="booking"  style="background: linear-gradient(90deg, #2563eb, black); color: white; padding: 30px 40px; text-align: center; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
    <h1 style="font-size: 36px; font-weight: 600; margin: 0;">Booking</h1>
</header>

<section style="max-width: 1200px; margin: 40px auto; background: white; padding: 40px; border-radius: 15px; box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15); text-align: center;">
    <h2 style="margin-bottom: 20px; font-size: 28px; color: #333; font-weight: 600;">Our Vehicle Type</h2>

    <div style="display: flex; justify-content: space-between; gap: 20px;">
        <div style="flex: 1; text-align: center; padding: 20px; background: #f8f9fa; border-radius: 15px; transition: transform 0.3s ease, box-shadow 0.3s ease; cursor: pointer; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);"
             onmouseover="this.style.transform='scale(1.07)'; this.style.boxShadow='0 6px 12px rgba(0, 0, 0, 0.15)';" 
             onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 8px rgba(0, 0, 0, 0.08)';">
            <img src="challenger-5880009_640.jpg" alt="Car icon" style="width: 120px; height: 120px; object-fit: cover; border-radius: 12px; margin-bottom: 10px;">
            <p style="font-weight: 600; font-size: 18px; color: #333;">Car</p>
        </div>

        <div style="flex: 1; text-align: center; padding: 20px; background: #f8f9fa; border-radius: 15px; transition: transform 0.3s ease, box-shadow 0.3s ease; cursor: pointer; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);"
             onmouseover="this.style.transform='scale(1.07)'; this.style.boxShadow='0 6px 12px rgba(0, 0, 0, 0.15)';" 
             onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 8px rgba(0, 0, 0, 0.08)';">
            <img src="carnival van.jpg" alt="Van icon" style="width: 120px; height: 120px; object-fit: cover; border-radius: 12px; margin-bottom: 10px;">
            <p style="font-weight: 600; font-size: 18px; color: #333;">Van</p>
        </div>

        <div style="flex: 1; text-align: center; padding: 20px; background: #f8f9fa; border-radius: 15px; transition: transform 0.3s ease, box-shadow 0.3s ease; cursor: pointer; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);"
             onmouseover="this.style.transform='scale(1.07)'; this.style.boxShadow='0 6px 12px rgba(0, 0, 0, 0.15)';" 
             onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 8px rgba(0, 0, 0, 0.08)';">
            <img src="Mini Cooper.jpeg" alt="Hatchback" style="width: 120px; height: 120px; object-fit: cover; border-radius: 12px; margin-bottom: 10px;">
            <p style="font-weight: 600; font-size: 18px; color: #333;">Hatchback</p>
        </div>

        <div style="flex: 1; text-align: center; padding: 20px; background: #f8f9fa; border-radius: 15px; transition: transform 0.3s ease, box-shadow 0.3s ease; cursor: pointer; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);"
             onmouseover="this.style.transform='scale(1.07)'; this.style.boxShadow='0 6px 12px rgba(0, 0, 0, 0.15)';" 
             onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 8px rgba(0, 0, 0, 0.08)';">
            <img src="Roll royce.webp" alt="Prestige icon" style="width: 120px; height: 120px; object-fit: cover; border-radius: 12px; margin-bottom: 10px;">
            <p style="font-weight: 600; font-size: 18px; color: #333;">Prestige</p>
        </div>
    </div>
</section>





<div class="details" style="position: relative; width: 90%; max-width: 1188px; margin: 40px auto; padding: 30px; background: rgba(0, 0, 0, 0.6); border-radius: 15px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3); backdrop-filter: blur(10px); color: white;">
    <div class="overlay" style="padding: 20px;">
        <h1 style="font-size: 36px; font-weight: 700; text-align: center; margin-bottom: 15px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">BMW M2 2020</h1>
        <p style="font-size: 18px; text-align: center; line-height: 1.8; margin-bottom: 25px; opacity: 0.9;">
            The BMW M2 is the high-performance version of the 2 Series 2-door coupé. The first generation of the M2 is the F87 coupé and is powered by turbocharged.
        </p>

        <div class="specifications" style="margin-bottom: 30px;">
            <h2 style="font-size: 24px; font-weight: 700; text-align: center; margin-bottom: 20px; border-bottom: 2px solid #007bff; display: inline-block; padding-bottom: 5px;">Specifications</h2>
            <ul style="list-style-type: none; padding: 0; font-size: 17px; display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
                <li style="display: flex; justify-content: space-between; padding: 12px; background: rgba(255, 255, 255, 0.2); border-radius: 8px; backdrop-filter: blur(5px); transition: 0.3s;" 
                    onmouseover="this.style.background='rgba(255, 255, 255, 0.4)'; this.style.color='black';" 
                    onmouseout="this.style.background='rgba(255, 255, 255, 0.2)'; this.style.color='white';">
                    <span>Body</span><span>Sedan</span>
                </li>
                <li style="display: flex; justify-content: space-between; padding: 12px; background: rgba(255, 255, 255, 0.2); border-radius: 8px; backdrop-filter: blur(5px); transition: 0.3s;" 
                    onmouseover="this.style.background='rgba(255, 255, 255, 0.4)'; this.style.color='black';" 
                    onmouseout="this.style.background='rgba(255, 255, 255, 0.2)'; this.style.color='white';">
                    <span>Doors</span><span>2 doors</span>
                </li>
                <li style="display: flex; justify-content: space-between; padding: 12px; background: rgba(255, 255, 255, 0.2); border-radius: 8px; backdrop-filter: blur(5px); transition: 0.3s;" 
                    onmouseover="this.style.background='rgba(255, 255, 255, 0.4)'; this.style.color='black';" 
                    onmouseout="this.style.background='rgba(255, 255, 255, 0.2)'; this.style.color='white';">
                    <span>Seating</span><span>2 seats</span>
                </li>
                <li style="display: flex; justify-content: space-between; padding: 12px; background: rgba(255, 255, 255, 0.2); border-radius: 8px; backdrop-filter: blur(5px); transition: 0.3s;" 
                    onmouseover="this.style.background='rgba(255, 255, 255, 0.4)'; this.style.color='black';" 
                    onmouseout="this.style.background='rgba(255, 255, 255, 0.2)'; this.style.color='white';">
                    <span>Engine</span><span>473 HP</span>
                </li>
                <li style="display: flex; justify-content: space-between; padding: 12px; background: rgba(255, 255, 255, 0.2); border-radius: 8px; backdrop-filter: blur(5px); transition: 0.3s;" 
                    onmouseover="this.style.background='rgba(255, 255, 255, 0.4)'; this.style.color='black';" 
                    onmouseout="this.style.background='rgba(255, 255, 255, 0.2)'; this.style.color='white';">
                    <span>Fuel Type</span><span>Hybrid</span>
                </li>
                <li style="display: flex; justify-content: space-between; padding: 12px; background: rgba(255, 255, 255, 0.2); border-radius: 8px; backdrop-filter: blur(5px); transition: 0.3s;" 
                    onmouseover="this.style.background='rgba(255, 255, 255, 0.4)'; this.style.color='black';" 
                    onmouseout="this.style.background='rgba(255, 255, 255, 0.2)'; this.style.color='white';">
                    <span>Year</span><span>2020</span>
                </li>
                <li style="display: flex; justify-content: space-between; padding: 12px; background: rgba(255, 255, 255, 0.2); border-radius: 8px; backdrop-filter: blur(5px); transition: 0.3s;" 
                    onmouseover="this.style.background='rgba(255, 255, 255, 0.4)'; this.style.color='black';" 
                    onmouseout="this.style.background='rgba(255, 255, 255, 0.2)'; this.style.color='white';">
                    <span>Transmission</span><span>Automatic</span>
                </li>
                <li style="display: flex; justify-content: space-between; padding: 12px; background: rgba(255, 255, 255, 0.2); border-radius: 8px; backdrop-filter: blur(5px); transition: 0.3s;" 
                    onmouseover="this.style.background='rgba(255, 255, 255, 0.4)'; this.style.color='black';" 
                    onmouseout="this.style.background='rgba(255, 255, 255, 0.2)'; this.style.color='white';">
                    <span>Drive Train</span><span>AWD</span>
                </li>
            </ul>
        </div>
    </div>
</div>



<div class="header">
       
       <h1>
           About Us
       </h1>
   </div>
   <div class="content">
       <h2>
           We offer customers a wide range of
           <span style="color: #4CAF50;">
               commercial cars
           </span>
           and
           <span style="color: #4CAF50;">
               luxury cars
           </span>
           for any occasion.
       </h2>
       <p >
           Welcome to Rentaly, your top choice for luxury sports car rentals! We are passionate car enthusiasts dedicated to providing an unforgettable driving experience. Our fleet features iconic brands like Ferrari, Lamborghini, and Porsche, all meticulously maintained for your enjoyment.

At Rentaly, we prioritize personalized service and your safety. Our friendly team is here to help you find the perfect car for any occasion. Experience the thrill of driving a premium sports car— <b style="color: black;">dream ride is just a click away!</b> 
       </p>
       <div class="stats">
           <div>
               <h3>
                   15425
               </h3>
               <p>
                   Hours of Work
               </p>
           </div>
           <div>
               <h3>
                   8745
               </h3>
               <p>
                   Clients Supported
               </p>
           </div>
           <div>
               <h3>
                   235
               </h3>
               <p>
                   Awards Winning
               </p>
           </div>
           <div>
               <h3>
                   15
               </h3>
               <p>
                   Years Experience
               </p>
           </div>
       </div>
       <div class="board">
           <h2>
               Board of Directors
           </h2>
           <div class="members">
               <div class="member">
                   <img alt="Portrait of a board member" src="Hassan'.jpg" />
                   <h3>
                       Hassan Subhani
                   </h3>
                   <div class="social">
                       <a href="#">
                           <i class="fab fa-facebook-f">
                           </i>
                       </a>
                       <a href="#">
                           <i class="fab fa-twitter">
                           </i>
                       </a>
                       <a href="https://www.instagram.com/hassan.subhani7/">
                           <i class="fab fa-linkedin-in">
                           </i>
                       </a>
                   </div>
               </div>
               <div class="member">
                   <img alt="Portrait of a board member" src="ans 2.jpg" />
                   <h3>
                       Ans Mustafa
                   </h3>
                   <div class="social">
                       <a href="#">
                           <i class="fab fa-facebook-f">
                           </i>
                       </a>
                       <a href="#">
                           <i class="fab fa-twitter">
                           </i>
                       </a>
                       <a href="#">
                           <i class="fab fa-linkedin-in">
                           </i>
                       </a>
                   </div>
               </div>
               <div class="member" id="member">
                   <img alt="Portrait of a board member" src="Talha.jpg" />
                   <h3>
                      Talha Tahir
                   </h3>
                   <div class="social">
                       <a href="#">
                           <i class="fab fa-facebook-f">
                           </i>
                       </a>
                       <a href="#">
                           <i class="fab fa-twitter">
                           </i>
                       </a>
                       <a href="#">
                           <i class="fab fa-linkedin-in">
                           </i>
                       </a>
                   </div>
               </div>
               <div class="member" id="member4">
                   <img alt="Portrait of a board member" src="Haider pic.jpg" height="740px" width="480px"/>
                   <h3>
                       Haider Ali Hashmi
                   </h3>
                   <div class="social">
                       <a href="#">
                           <i class="fab fa-facebook-f">
                           </i>
                       </a>
                       <a href="#">
                           <i class="fab fa-twitter">
                           </i>
                       </a>
                       <a href="#">
                           <i class="fab fa-linkedin-in">
                           </i>
                       </a>
                   </div>
               </div>
               
           </div>
       </div>
   </div>

   <footer>
        © 2025 Rentaly. All rights reserved. | Privacy Policy | Terms of Service
    </footer>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
    $(document).on("click", ".rent-now", function() {
        let carId = $(this).data("car-id");
        let carModel = $(this).data("car-model");
        let carRate = $(this).data("car-rate");

        // Update the booking form fields
        $("#car_id").val(carId).change();  // Set car dropdown
        $("#daily_rate").val(carRate);      // Set price field

        // Optional: Scroll smoothly to the booking form
        $("html, body").animate({
            scrollTop: $("#booking-form").offset().top
        }, 800);
    });
});

    </script>


</body>