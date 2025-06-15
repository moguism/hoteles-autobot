from mcp.server.fastmcp import FastMCP

# Create an MCP server
mcp = FastMCP("MCP")

# Add an addition tool
@mcp.tool()
def add(a: int, b: int) -> int:
    """Add two numbers"""
    return a + b

# Add a dynamic greeting resource
@mcp.resource("greeting://{name}")
def get_greeting(name: str) -> str:
    """Get a personalized greeting"""
    return f"Hello, {name}!"

# Inicia el servidor (no viene en el ejemplo oficial por alguna razón)
if __name__ == "__main__":
    mcp.run()