<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Directorio Telefónico</title>
   <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

	<style type="text/css">
	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-weight: normal;
		margin: 0 0 14px 0;

	}

	</style>
</head>
<body>
<div class="container">
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">
    <img src="data:image/jpeg;base64,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" alt="Logo" style="width:40px;">
  </a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="<?=site_url('welcome')?>">Inicio <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?=site_url('Grupocontacto')?>">Grupos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?=site_url('Contactos')?>">Contactos</a>
    </li>

    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Cuenta
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Perfil</a>
        <a class="dropdown-item" href="#">Cambio contraseña</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Cerrar sessión</a>
      </div>
    </li>
  </ul>
</nav>
<h1>DIRECTORIO TELEFÓNICO</h1>
