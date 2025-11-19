Sistema de Inventário e Depreciação
Trabalho 04 — Design Patterns

Aluno: Gustavo Borgonha
Linguagem: PHP 8+

📘 1. Descrição do Problema

O objetivo do sistema é gerenciar ativos patrimoniais e simular sua depreciação anual, aplicando diferentes métodos de cálculo conforme o tipo do ativo (equipamento, veículo etc).

Além da depreciação base, ativos podem receber ajustes adicionais, como:

Valor residual mínimo

Reavaliação do valor (+10%, por exemplo)

O sistema deve permitir:

Cadastrar um ativo

Criar automaticamente a estratégia de depreciação

Aplicar decorators opcionalmente

Simular a depreciação ao longo da vida útil

Utilizar menu CLI exibindo:
“Desenvolvido por: Gustavo Borgonha”

🧩 2. Padrões de Projeto Implementados

O trabalho exige 3 padrões — foram implementados:

✔ 2.1 STRATEGY — Métodos de Depreciação
Por que foi escolhido

Cada tipo de ativo pode ter um método diferente de depreciação. Usar Strategy permite:

Trocar o algoritmo em tempo real

Reduzir condicionais (if/switch)

Facilitar inclusão de novos métodos

Estratégias implementadas

LinearStrategy — deprecia valor/vida útil

SomaDigitosStrategy — método acelerado por somatório

Diagrama Strategy
classDiagram
    class DepreciacaoStrategy {
        <<interface>>
        +calcular(valor, vidaUtil, ano)
    }

    DepreciacaoStrategy <|.. LinearStrategy
    DepreciacaoStrategy <|.. SomaDigitosStrategy

✔ 2.2 DECORATOR — Ajustes de Depreciação
Por que foi escolhido

Nem sempre a depreciação é apenas linear ou por somatório. O ativo pode receber ajustes extras, que devem:

Ser cumulativos

Ser opcionais

Não modificar o código das estratégias

Decorator permite empilhar quantos ajustes forem necessários.

Decorators implementados

ResidualDecorator — assegura valor mínimo (reduz 100 por exemplo)

ReavaliacaoDecorator — aumenta o valor calculado (+10%)

Diagrama Decorator
classDiagram
    class DepreciacaoStrategy {
        <<interface>>
    }

    class DepreciacaoDecorator {
        -wrappee : DepreciacaoStrategy
    }

    DepreciacaoStrategy <|-- DepreciacaoDecorator
    DepreciacaoDecorator <|-- ResidualDecorator
    DepreciacaoDecorator <|-- ReavaliacaoDecorator

✔ 2.3 FACTORY METHOD — Criar Estratégia por Tipo de Ativo
Por que foi escolhido

O sistema deve escolher automaticamente o método de depreciação baseado no tipo de ativo cadastrado.
A Factory permite:

Centralizar criação da estratégia

Reduzir acoplamento no domínio

Permitir adicionar novos tipos sem alterar código existente

Diagrama Factory
classDiagram
    class DepreciacaoFactory {
        +criar(tipoAtivo) : DepreciacaoStrategy
    }

🏛️ 3. Arquitetura e Organização das Pastas

O projeto segue a estrutura recomendada no enunciado:

/
├── app/
│   └── menu.php
├── domain/
│   └── Ativo.php
├── strategies/
│   ├── DepreciacaoStrategy.php
│   ├── LinearStrategy.php
│   └── SomaDigitosStrategy.php
├── decorators/
│   ├── DepreciacaoDecorator.php
│   ├── ResidualDecorator.php
│   └── ReavaliacaoDecorator.php
├── factory/
│   ├── DepreciacaoFactory.php
├── infra/
│   ├── Config.php (Singleton)
│   └── Logger.php
├── tests/
│   ├── StrategyTest.php
│   ├── DecoratorTest.php
│   └── FactoryTest.php
└── README.md

🧪 4. Testes Automatizados (PHPUnit)

Os testes cobrem:

Padrão	O que o teste comprova
Strategy	troca dinâmica + resultados diferentes
Decorator	composição de decorators funciona em cadeia
Factory	criação correta da Strategy por tipo
Singleton	unicidade da instância

Exemplos incluídos na pasta /tests.

🖥️ 5. Menu CLI

Exige entrada do usuário, calcula depreciação, aplica decorators e exibe no final:

=== Sistema de Depreciação ===
Desenvolvido por: Gustavo Borgonha


Executável via:

php app/menu.php

🔧 6. Como Executar o Projeto
Instalar dependências
composer install

Rodar o menu
php app/menu.php

Rodar testes
vendor/bin/phpunit --bootstrap vendor/autoload.php tests

🧠 7. Decisões de Design

Strategy encapsula os algoritmos de depreciação, permitindo alternância limpa.

Decorator mantém os cálculos independentes, evitando "mega-estratégias".

Factory Method impede acoplamento do domínio aos algoritmos concretos.

Singleton foi usado em Config para manter configurações globais.

Pastas seguem recomendação do enunciado.

🎓 8. Créditos

Sistema desenvolvido para o Trabalho 04 — Design Patterns
Aluno: Gustavo Borgonha
