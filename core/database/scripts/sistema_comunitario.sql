-- Tabla Roles
CREATE TABLE Roles (
    id_rol INT AUTO_INCREMENT PRIMARY KEY,
    rol_name VARCHAR(50) NOT NULL
);

-- Tabla Usuarios
CREATE TABLE Usuarios (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    fk_role INT NOT NULL,
    FOREIGN KEY (fk_role) REFERENCES Roles(id_rol)
);

-- Tabla Género
CREATE TABLE Generos (
    id_genero INT AUTO_INCREMENT PRIMARY KEY,
    nombre_genero VARCHAR(20) NOT NULL
);

-- Tabla Edad_Categoria
CREATE TABLE Edad_Categorias (
    id_edad_categoria INT AUTO_INCREMENT PRIMARY KEY,
    edad_categoria VARCHAR(50) NOT NULL
);

-- Tabla Grupo_Familiar
CREATE TABLE Grupo_Familiares (
    id_grupo_familiar INT AUTO_INCREMENT PRIMARY KEY,
    apellido_paterno VARCHAR(50) NOT NULL,
    apellido_materno VARCHAR(50) NOT NULL
);

-- Tabla Residentes
CREATE TABLE Residentes (
    id_residente INT AUTO_INCREMENT PRIMARY KEY,
    cedula_residente VARCHAR(15) UNIQUE NULL,
    nombre_residente VARCHAR(50) NOT NULL,
    apellido_residente VARCHAR(50) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    edad INT NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    embarazo BOOLEAN NOT NULL,
    fk_genero INT NOT NULL,
    fk_edad_categoria INT NOT NULL,
    FOREIGN KEY (fk_genero) REFERENCES Generos(id_genero),
    FOREIGN KEY (fk_edad_categoria) REFERENCES Edad_Categorias(id_edad_categoria)
);