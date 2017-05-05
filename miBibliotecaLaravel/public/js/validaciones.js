function ValidarNombre(nombre)
{
	var resultado = "";
	var userlenght = nombre.length;
	if (userlenght < 4)
	{
		resultado = "poco";
	}
	else
	{
		resultado = "bien";
	}
	return resultado;
}

function validaNombre2(nom)
{
	var resultado = "";
	var userlenght = nom.length;
    if(userlenght < 4)
    {
        resultado = "poco";
    } 
    else
    {
        nom = nom.toUpperCase();
        for(i = 0; i < nom.length; i++)
        {  
            car = nom.charAt(i);
                if( car != ' ')
                {
                    if(car<'A' || car>'Z')
                    {
                        resultado = "invalido"; 
                        break;
                    }
                }
        }                
    }
    return resultado;
}