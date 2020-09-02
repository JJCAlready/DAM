{******************************************************************************
    Vista de la página principal. 
    Si el usuario todavía no se a autenticado, muestra un formulario de acceso
    y un formulario de registro.
    Si el usuario se ha autenticado, muestra un formulario de acceso con otro
    usuario y un formulario de modificación de datos o borrado del usuario. 
******************************************************************************}

{include file="cabecera.tpl"}
    
<div class='contenedor_formulario'>
    <div class='formulario'>
        <form action='index.php' method='post'> 
            <span class='titulo_formulario'> {$tituloAcceso} </span>
            <label for="usuario">* Usuario:</label>
            <input type="text" style="width: 120px;" name="usuario" value='{$usuario}' /><br>
            <label for="password">* Password:</label>
            <input type="password" style="width: 120px;"name="password" value='{$password}' /><br>
            <div class='botonera'>
                <input type="submit" name="accion" value="Acceder" />
            </div>
            <div class='error'>
                {foreach from=$errores item=error}
                    {$error}<br />
                {/foreach} 
            </div>
            <div class='informacion'>
                {$inforAcceso}
            </div>  
        </form>         
    </div>  
</div>
<br>
<center>
    <a class="{$class_eliminar}" href="aplicacion.php">Ir a la página de la aplicación</a>    
</center>
<br>
    <div class='formulario'>
        <form action='index.php' method='post'> 
            <span class='titulo_formulario'> {$tituloRegMod} </span>
            <label for="usuario">* Usuario:</label>
            <input type="text" style="width: 120px;" name="usuario_reg" value='{$usuario_reg}' {$disableUsuario}/><br>
            <label for="password1">* Password:</label>
            <input type="password" style="width: 120px;"name="password1" value='{$password1}' /><br>
            <label for="password2">* Repita password:</label>
            <input type="password" style="width: 120px;"name="password2" value='{$password2}' /><br>
            <label for="email">* Email:</label>
            <input type="text" style="width: 120px;" name="email" value='{$email}' /><br>
            <div class='botonera'>
                <input type="submit" name="accion" value="{$botonRegMod}" />
                <input type="submit" name="accion" value="Eliminar" class="{$class_eliminar}"/>
            </div>
            <div class='error'>
                {foreach from=$erroresRegMod item=error}
                    {$error}<br />
                {/foreach}
            </div>
            <div class='informacion'>
                {$inforRegMod}
            </div>
             <div class='aviso'>
                {$aviso}
            </div>  
        </form>         
    </div>  

{include file="pie.tpl"}
