const { execSync } = require('child_process');

exports.handler = async (event, context) => {
    try {
        // Ejecutamos el archivo index.php usando el binario de PHP del servidor
        const output = execSync(`php index.php`, {
            cwd: __dirname,
            encoding: 'utf8'
        });

        return {
            statusCode: 200,
            headers: { 'Content-Type': 'text/html' },
            body: output
        };
    } catch (error) {
        return {
            statusCode: 500,
            body: `Error ejecutando PHP: ${error.message}`
        };
    }
};