from mcp.server.fastmcp import FastMCP
import requests
import constants

# Crea el servidor MCP
mcp = FastMCP("MCP")

# Obtiene todos junto con sus relaciones del servidor de Laravel
@mcp.tool()
def obtain_all_hotels_services() -> int:
    response = requests.get(str(constants.API_URL, "hotels-services/all"))
    json = response.json()
    print(json)
    return json

# Inicia el servidor (no viene en el ejemplo oficial por alguna razón). Usa el puerto 5000
if __name__ == "__main__":
    mcp.run("sse")