#!/usr/bin/python
# -*- coding: utf-8 -*-

import os
import sys
from shutil import copyfile, move


controllersPath = 'application/controllers/'
modelsPath = 'application/models/'
viewsPath = 'application/views/'

crud_generator_files = 'crud_generator_files/'

def create_controller(param):
    # Verificando se controller já existe
    if os.path.isfile(controllersPath + param + 's.php'):
        print 'Controller Existe'
    else:
        result_file_name = param.lower() + 's.php'
        result_file = crud_generator_files + result_file_name

        default_controller_file = crud_generator_files + 'controller_file.php'
        controller_name = param + 's'
        model_name = param + '_model'
        cap_param_name = param.capitalize()

        print 'Controller Não existe. Criando cópia de arquivo'
        copyfile(crud_generator_files + 'controller_file.php', result_file)

        f_read = open(default_controller_file, "r")
        f_write = open(result_file, "w+")

        text = f_read.read()
        text = text.replace("{{class_name}}", controller_name.capitalize())
        text = text.replace("{{controller_name}}", controller_name)
        text = text.replace("{{model_name}}", model_name)
        text = text.replace("{{cap_param_name}}", cap_param_name)
        text = text.replace("{{param_name}}", param)

        f_write.write(text)
        f_write.close()

        move(result_file,controllersPath + result_file_name.capitalize())

        pass


def create_model(param):
    # Verificando se model já existe
    if os.path.isfile(modelsPath + param + '_model.php'):
        print 'Model já existe'
    else:
        result_file_name = param.lower() + '_model.php'
        result_file = crud_generator_files + result_file_name

        default_model_file = crud_generator_files + 'model_file.php'
        model_name = param + '_model'

        print 'Model Não existe. Criando cópia de arquivo'
        copyfile(crud_generator_files + 'model_file.php', result_file.capitalize())

        f_read = open(default_model_file, "r")
        f_write = open(result_file, "w+")

        text = f_read.read()
        text = text.replace("{{class_name}}", model_name.capitalize())
        text = text.replace("{{model_name}}", model_name)
        text = text.replace("{{table_name}}", param + 's')
        text = text.replace("{{param_name}}", param)

        f_write.write(text)
        f_write.close()

        move(result_file,modelsPath + result_file_name.capitalize())
    pass


def create_views(param):
    view_dir_path = viewsPath + param + 's'
    if not os.path.exists(view_dir_path):
        os.makedirs(view_dir_path)

        open(viewsPath + param + 's' + '/create.php','a').close()
        open(viewsPath + param + 's' + '/edit.php','a').close()
        open(viewsPath + param + 's' + '/list.php','a').close()

    pass


metodo = sys.argv[1]
param = sys.argv[2]

if metodo == 'create_controller':
    create_controller(param)
    pass

if metodo == 'create_model':
    create_model(param)
    pass

if metodo == 'create_views':
    create_views(param)

if metodo == 'create':
    create_controller(param)
    create_model(param)
    create_views(param)
