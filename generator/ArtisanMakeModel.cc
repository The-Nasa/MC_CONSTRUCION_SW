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

void generateRegistroProducto(const string &inputFileName, const string &outputFileName)
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
    outputFile << "class registroProducto" << endl;
    outputFile << "{" << endl;
    outputFile << "    private $conexion;" << endl;
    outputFile << endl;
    outputFile << "    public function __construct()" << endl;
    outputFile << "    {" << endl;
    outputFile << "        $this->conexion = Conexion::obtenerConexion();" << endl;
    outputFile << "    }" << endl;
    outputFile << endl;

    vector<string> campos;
    string line;

    // Leer el archivo línea por línea y extraer nombres de campos
    while (getline(inputFile, line))
    {
        line = trim(line);
        if (!line.empty() && line.find("--") == string::npos) // Ignorar líneas vacías o comentarios
        {
            vector<string> parts = split(line, ' ');
            if (!parts.empty())
            {
                string fieldName = parts[0];
                // Validar nombres de campos
                if (fieldName != "(" && !fieldName.empty())
                {
                    campos.push_back(fieldName);
                }
            }
        }
    }

    // Generar método SELECT
    outputFile << "    public function obtenerProductos()" << endl;
    outputFile << "    {" << endl;
    outputFile << "        $query = $this->conexion->query(\"SELECT ";
    for (size_t i = 1; i < campos.size() - 2; ++i)
    {
        outputFile << campos[i] << ", " << endl;
        outputFile << "                                        ";
    }

    outputFile << "FROM productos\");" << endl;
    outputFile << "        return $query->fetchAll(PDO::FETCH_ASSOC);" << endl;
    outputFile << "    }" << endl;
    outputFile << endl;

    // Generar método INSERT
    outputFile << "    public function insertarProducto(";
    for (size_t i = 1; i < campos.size() - 2; ++i)
    {
        outputFile << "$" << campos[i] << ", "; //<< endl;
        // outputFile << "                                        ";
    }
    outputFile << ")" << endl;
    outputFile << "    {" << endl;
    outputFile << "        $query = \"INSERT INTO productos (";
    for (size_t i = 1; i < campos.size() - 2; ++i)
    {
        outputFile << campos[i] << ", "; //<< endl;
        // outputFile << "                                        ";
    }
    outputFile << ")" << endl;
    outputFile << "        VALUES (";
    for (size_t i = 1; i < campos.size() - 2; ++i)
    {
        outputFile << ":" << campos[i] << ", "; //<< endl;
        // outputFile << "                                        ";
    }
    outputFile << ")\";" << endl;

    outputFile << "        $stmt = $this->conexion->prepare($query);" << endl;
    for (size_t i = 1; i < campos.size() - 2; ++i)

    {
        outputFile << "        $stmt->bindParam(':" << campos[i] << "', $" << campos[i] << ");" << endl;
    }
    outputFile << "        return $stmt->execute();" << endl;
    outputFile << "    }" << endl;
    outputFile << endl;

    // Generar método DLETE
    outputFile << "    public function eliminarProductoPorId($id)" << endl;
    outputFile << "    {" << endl;
    outputFile << "        $query = \"DELETE FROM productos WHERE id = :id\";" << endl;
    outputFile << "        $stmt = $this->conexion->prepare($query);" << endl;
    outputFile << "        $stmt->bindParam(':id', $id);" << endl;
    outputFile << "        return $stmt->execute();" << endl;
    outputFile << "    }" << endl;
    outputFile << endl;

    // Generar método UPDATE
    outputFile << "    public function actualizarProducto(";
    for (size_t i = 1; i < campos.size() - 2; ++i)
    {
        outputFile << "$" << campos[i] << ", "; //<< endl;
    }
    outputFile << ")" << endl;
    outputFile << "    {" << endl;
    outputFile << "        $query = \"UPDATE productos SET ";
    for (size_t i = 1; i < campos.size() - 2; ++i)
    {
        outputFile << campos[i] << " = :" << campos[i] << ", "; //<< endl;
    }
    outputFile << " WHERE id = :id\";" << endl;
    outputFile << "        $stmt = $this->conexion->prepare($query);" << endl;
    for (size_t i = 1; i < campos.size() - 2; ++i)
    {
        outputFile << "        $stmt->bindParam(':" << campos[i] << "', $" << campos[i] << ");" << endl;
    }
    outputFile << "        return $stmt->execute();" << endl;
    outputFile << "    }" << endl;
    outputFile << endl;

    // Método para obtener un producto por nombre
    outputFile << "    public function obtenerProductoPorNombre($DETALLE)" << endl;
    outputFile << "    {" << endl;
    outputFile << "        $query = \"SELECT ";
    for (size_t i = 1; i < campos.size() - 2; ++i)
    {
        outputFile << campos[i] << ", "; //<< endl;
    }
    outputFile << " FROM productos" << endl;
    outputFile << "   WHERE DETALLE = :DETALLE\";" << endl;
    outputFile << "        $stmt = $this->conexion->prepare($query);" << endl;
    outputFile << "        $stmt->bindParam(': DETALLE', $DETALLE);" << endl;
    outputFile << "        return $stmt->execute();" << endl;
    outputFile << "    }" << endl;
    outputFile << endl;

    outputFile << "}" << endl;
    outputFile << "?>" << endl;

    inputFile.close();
    outputFile.close();

    cout << "Archivo generado: " << outputFileName << endl;
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

    generateRegistroProducto(inputFileName, outputFileName);

    return 0;
}