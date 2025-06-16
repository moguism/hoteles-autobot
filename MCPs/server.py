import requests
import constants
from fastapi import FastAPI
from fastapi_mcp import FastApiMCP
import uvicorn

# El servidor base es FastAPI
app = FastAPI(debug=True, title="MCP API")

# Obtiene todos junto con sus relaciones del servidor de Laravel
@app.get("/hotels-services")
def obtain_all_hotels_services() -> int:
    response = requests.get(str(constants.API_URL, "hotels-services/all"))
    json = response.json()
    print(json)
    return json

mcp = FastApiMCP(app)
mcp.mount() # Para tener acceso al MCP

# Inicia el servidor
if __name__ == "__main__":
    # "server" es el nombre del archivo, y "app" es el de la variable que he creado antes
    uvicorn.run("server:app", port=5000, reload=True)