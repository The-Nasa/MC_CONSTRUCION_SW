#include <iostream>
#include <fstream>
#include <string>
#include <sstream>
#include <vector>
#include <algorithm>

using namespace std;

// Función para eliminar espacios iniciales y finales
string trim(const string &str)
{
    size_t first = str.find_first_not_of(" ");
    size_t last = str.find_last_not_of(" ");
    return (first == string::npos || last == string::npos) ? "" : str.substr(first, (last - first + 1));
}

// Función para dividir cadenas por un delimitador
vector<string> split(const string &str, char delimiter)
{
    vector<string> tokens;
    stringstream ss(str);
    string token;

    while (getline(ss, token, delimiter))
    {
        tokens.push_back(trim(token));
    }

    return tokens;
}

void generadoorPropiedadesProducto(const string &inputFileName, const string &outputFileName)
{
    ifstream inputFile(inputFileName);
    ofstream outputFile(outputFileName);

    if (!inputFile.is_open())
    {
        cerr << "Error al abrir el archivo de entrada: " << inputFileName << endl;
        return;
    }

    if (!outputFile.is_open())
    {
        cerr << "Error al abrir el archivo de salida: " << outputFileName << endl;
        return;
    }

    // Escribir cabecera del archivo PHP
    outputFile << "<?php" << endl;
    outputFile << "require_once $_SERVER['DOCUMENT_ROOT'] . '/models/connect/conexion.php';" << endl;
    outputFile << endl;
    outputFile << "class propiedadesProducto" << endl;
    outputFile << "{" << endl;
    outputFile << "    private $conexion;" << endl;
    outputFile << endl;
    outputFile << "    public function __construct()" << endl;
    outputFile << "    {" << endl;
    outputFile << "        $this->conexion = Conexion::obtenerConexion();" << endl;
    outputFile << "    }" << endl;
    outputFile << endl;
    outputFile << "    public function obtenerPropiedades()" << endl;
    outputFile << "    {" << endl;
    outputFile << "        $sql = 'SELECT * FROM propiedades';" << endl;
    outputFile << "        $stmt = $this->conexion->prepare($sql);" << endl;
    outputFile << "        $stmt->execute();" << endl;
    outputFile << "        return $stmt->fetchAll(PDO::FETCH_ASSOC);" << endl;
    outputFile << "    }" << endl;
    outputFile << "}" << endl;
    outputFile << "?>" << endl;

    inputFile.close();
    outputFile.close();

    cout << "Archivo generado correctamente: " << outputFileName << endl;

    return;
}
int main(int argc, char *argv[])
{
    if (argc != 3)
    {
        cerr << "Uso del comando ArtisanMakeModel: " << argv[0] << " <archivo_entrada> <archivo_salida>" << endl;
        return 1;
    }

    string inputFileName = argv[1];
    string outputFileName = argv[2];

    generadoorPropiedadesProducto(inputFileName, outputFileName);

    return 0;
}