function ValidaNombre(nom)
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

function ValidaObra(nom)
{
   var resultado = "bien";
    var userlenght = nom.length;
    if(userlenght == 0)
    {
        resultado = "";
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

    