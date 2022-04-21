SELECT COUNT(*) FROM funcionario_has_departamento 
                                    INNER JOIN funcionario ON funcionario_has_departamento.funcionario_id = funcionario.id 
                                    INNER JOIN departamento ON funcionario_has_departamento.departamento_id = departamento.id
                                    INNER JOIN funcionario_has_cargos ON funcionario.id = funcionario_has_cargos.funcionario_id
                                    INNER JOIN cargos ON funcionario_has_cargos.cargos_id = cargos.id
                                    INNER JOIN genero on funcionario.idGenero = genero.id
                                    ORDER BY funcionario.nomeFuncionario DESC