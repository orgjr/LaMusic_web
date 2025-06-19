import sqlite3
import os

file_path = os.path.dirname(__file__)
db_path = os.path.join(file_path, './db/myappdb.db')

conn = sqlite3.connect(db_path)
cur = conn.cursor()

def tb_cat():
    cur.execute('''CREATE TABLE IF NOT EXISTS categorias(
    categoria_id INTEGER PRIMARY KEY AUTOINCREMENT,
    nome_categoria VARCHAR(80)
    )
    ''')

def tb_inst():
    cur.execute('''CREATE TABLE IF NOT EXISTS instrumentos(
    instrumento_id INTEGER PRIMARY KEY AUTOINCREMENT,
    nome_instrumento VARCHAR(150),
    descricao VARCHAR(300),
    preco INTEGER,
    categoria_id INTEGER,
    imagem VARCHAR(100)
    )
    ''')

def tb_cliente():
    cur.execute('''CREATE TABLE IF NOT EXISTS clientes(
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nome VARCHAR(150),
    email VARCHAR(100),
    senha VARCHAR(100),
    telefone INTEGER,
    genero INTEGER,
    data_nascimento INTEGER
    )
    ''')

def ins_audio():
    cur.execute('''INSERT INTO categorias(nome_categoria) VALUES("Audio");''')
    conn.commit()
    print('Insert operation success.')

def ins_corda():
    cur.execute('''INSERT INTO categorias(nome_categoria) VALUES("Cordas");''')
    conn.commit()
    print('Insert operation success.')

def ins_percussao():
    cur.execute('''INSERT INTO categorias(nome_categoria) VALUES("Percussão");''')
    conn.commit()
    print('Insert operation success.')

def ins_acessorio():
    cur.execute('''INSERT INTO categorias(nome_categoria) VALUES("Acessórios");''')
    conn.commit()
    print('Insert operation success.')

def ins_tecla_e_sopro():
    cur.execute('''INSERT INTO categorias(nome_categoria) VALUES("Teclas e Sopro");''')
    conn.commit()
    print('Insert operation success.')


def sel_categoria():
    cur.execute('SELECT * FROM categorias;')
    for x in cur.fetchall():
        print(x)

def sel_instrumento():
    cur.execute('SELECT * FROM instrumentos;')
    for x in cur.fetchall():
        print(x)

def sel_cliente():
    cur.execute('SELECT * FROM clientes;')
    for x in cur.fetchall():
        print(x)

def ins():
    cur.execute('''INSERT INTO clientes(nome, email, senha, telefone, genero, data_nascimento) VALUES ("Joao", "joao@teste.com", "1234", "55555555", "masculino", "00000000")''')
    conn.commit()
    print('Insert operation success.')

def update_inst(): 
    image = "assets/img/teclas/piano1.png"
    cur.execute('''UPDATE instrumentos SET imagem=? WHERE nome_instrumento="Piano Digital"''', (image, ))
    conn.commit()
    print('Update operation success.')

def drop_tb():
    cur.execute('DROP TABLE clientes;')
    print('Drop table operation success.')

def show_tb():
    cur.execute('PRAGMA table_list;')
    for x in cur.fetchall():
        print(x)

def delete(): 
    cur.execute('''DELETE FROM clientes WHERE nome="Joao";''')
    conn.commit()
    print('Delete operation success.')

# if __name__ == '__main__':
#     sel_cliente()

conn.close()