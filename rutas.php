<?php 
    require "../utils/autoload.php";

    Routes::AddView("/","inicio");
    Routes::AddView("/login","login");
    Routes::Add("/login","post","SesionControlador::IniciarSesion");
    Routes::AddView("/usuario/alta","altaDeUsuario");
    Routes::AddView("/persona/alta","altaDePersona");
    Routes::Add("/persona/lista","get","PersonaControlador::Listar");

    Routes::Add("/persona/alta","post","PersonaControlador::Alta");

    Routes::Add("/usuario/alta","post","UsuarioControlador::Alta");
    Routes::Add("/cerrarSesion","get","SesionControlador::CerrarSesion");    
    
    Routes::Run();

       