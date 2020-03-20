


var progreso = 0;
var barra_progreso = 2;
var nivel_riesgo = 0;

var input_name = '';
var input_cc = ''; 
var input_edad = '';
var riesgo = '';

var preguntas_con = ["¿Sabes qué es y para qué sirve la citología?",
"¿Sabes cuándo debe iniciarse la toma de citología  vaginal?",
"¿Sabes cada cuánto tiempo debe tomarse la citología vaginal?"];

var respuestas_con = ["Recuerda que la citología vaginal es un examen sencillo que se realiza a las mujeres y consiste en tomar una pequeña muestra de tejido del cuello del útero para ser analizada en el laboratorio. Sirve para detectar el cáncer de cuello uterino en etapas tempranas, lo que permite realizar el tratamiento a tiempo.",
"No olvides que la toma de la citología debe hacerse desde que inicias la vida sexual.",
"Usualmente la citología se realiza una vez al año. Sin embargo, dependiendo de tus resultados, el médico/a te indicará cada cuanto debes repetirla."];

var preguntas_act = ["","","",
"Todas las mujeres que tienen relaciones sexuales deben hacerse la citología.",
"La citología es un examen incómodo y da vergüenza hacérselo.",
"La citología es un examen doloroso."];

var respuestas_act = ["","","",
"Todas las mujeres que ya han empezado a tener relaciones sexuales deben hacerse la citología una vez por año o con la frecuencia que su médico/a les indique.",
"La citología es un examen que puede resultar incómodo y puede producir vergüenza o pena con quien toma la muestra. No obstante, es necesario para tu mantener tu salud. Una actitud positiva y comunicar los sentimientos al personal de salud es de mucha utilidad para que el examen transcurra sin inconvenientes.",
"La citología no debería producir ningún tipo de dolor si se realiza correctamente. Puede ser un poco incómoda si la mujer está tensa en el momento de tomar la muestra. Es conveniente comunicar tus sentimientos al personal de la salud, estar relajada y controlar los nervios."];

var preguntas_pra = ["","","","","","",
"La falta de tiempo dificulta que me tome la citología.",
"¿Tienes o has tenido alguna vez más de un compañero sexual?",
"¿En el último año te hiciste la citología y reclamaste los resultados?",
"¿Sabes qué hacer si tu resultado de citología es sospechoso?",
"¿Sabes qué hacer si tu resultado de citología sale bien?"];

var respuestas_pra = ["","","","","","",
"Aunque las mujeres estamos muy ocupadas con tareas del hogar y/o del trabajo, tu salud es prioritaria. Si el cáncer de cuello uterino se detecta a tiempo es totalmente manejable.",
"El cáncer de cuello de útero se asocia con la infección por el virus del papiloma humano que se adquiere por vía sexual. De ahí, la importancia de hacerse la citología si mantienes una vida sexual activa.",
"Es muy importante tomarse la citología cuando inicias relaciones sexuales, y según tus resultados con la frecuencia que tu médico/a te indique. Recuerda reclamar tus resultados 2 semanas después de hacerte la prueba para detectar cualquier anormalidad.",
"Si los resultados de la citología son sospechosos, el profesional de la salud que entregue el resultado debe remitirte a tu  EPS para que el médico ordene otras pruebas como colposcopia, biopsia, prueba de VPH o Virus de Papiloma Humano, entre otras, según el caso.",
"Si tu citología sale bien no se puede, ni se debe bajar la guardia. Es importante realizarse una nueva citología al año, pues las lesiones precancerosas y los cánceres de cuello uterino en etapa inicial muchas veces no presentan señales ni síntomas."];