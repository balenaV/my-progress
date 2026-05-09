# Design System - My Progress

## Visão geral

O **My Progress** é uma plataforma privada de vídeo, gestão de conhecimento e IA local.

Esta paleta foi criada para transmitir foco, organização, progresso, aprendizado contínuo e profundidade cognitiva.

---

## Paleta principal

### Primária — Identidade e foco cognitivo

Usada para identidade visual, navegação, botões principais e elementos de foco.

| Token | Cor | Uso |
|---|---|---|
| `primary-50` | `#EEEDFE` | Fundo leve e destaques suaves |
| `primary-200` | `#AFA9EC` | Bordas e estados secundários |
| `primary-400` | `#7F77DD` | Destaques médios |
| `primary-600` | `#534AB7` | Cor principal da UI |
| `primary-800` | `#3C3489` | Hover e estados fortes |
| `primary-900` | `#26215C` | Fundo escuro institucional |

---

### Destaque — Progresso, IA e estado ativo

Usada para progresso, IA, status ativo e estados positivos.

| Token | Cor | Uso |
|---|---|---|
| `accent-50` | `#E1F5EE` | Fundo leve de sucesso ou IA |
| `accent-200` | `#5DCAA5` | Badges e bordas positivas |
| `accent-400` | `#1D9E75` | Cor principal de progresso |
| `accent-600` | `#0F6E56` | Hover e estado ativo forte |
| `accent-800` | `#085041` | Estado concluído forte |

---

### Quente — Anotações e timestamps

Usada para anotações, timestamps, marcações e destaques contextuais.

| Token | Cor | Uso |
|---|---|---|
| `warm-50` | `#FAEEDA` | Fundo leve de anotação |
| `warm-200` | `#FAC775` | Tags e bordas |
| `warm-400` | `#EF9F27` | Cor principal de timestamps |
| `warm-600` | `#854F0B` | Hover e destaque forte |

---

### Neutro — Superfícies e tipografia

Usada para fundos, textos, cards, bordas e superfícies.

| Token | Cor | Uso |
|---|---|---|
| `neutral-50` | `#F1EFE8` | Fundo claro |
| `neutral-200` | `#B4B2A9` | Bordas e divisórias |
| `neutral-600` | `#5F5E5A` | Texto secundário |
| `neutral-800` | `#444441` | Texto principal |
| `neutral-900` | `#2C2C2A` | Fundo escuro |

---

### Estado — Erro e alerta

Usada para erros, validações, falhas e ações destrutivas.

| Token | Cor | Uso |
|---|---|---|
| `danger-300` | `#F0997B` | Fundo leve de erro |
| `danger-500` | `#D85A30` | Erro principal |
| `danger-700` | `#993C1D` | Hover destrutivo |

---

## Tokens CSS sugeridos

```css
:root {
  --color-primary-50: #EEEDFE;
  --color-primary-200: #AFA9EC;
  --color-primary-400: #7F77DD;
  --color-primary-600: #534AB7;
  --color-primary-800: #3C3489;
  --color-primary-900: #26215C;

  --color-accent-50: #E1F5EE;
  --color-accent-200: #5DCAA5;
  --color-accent-400: #1D9E75;
  --color-accent-600: #0F6E56;
  --color-accent-800: #085041;

  --color-warm-50: #FAEEDA;
  --color-warm-200: #FAC775;
  --color-warm-400: #EF9F27;
  --color-warm-600: #854F0B;

  --color-neutral-50: #F1EFE8;
  --color-neutral-200: #B4B2A9;
  --color-neutral-600: #5F5E5A;
  --color-neutral-800: #444441;
  --color-neutral-900: #2C2C2A;

  --color-danger-300: #F0997B;
  --color-danger-500: #D85A30;
  --color-danger-700: #993C1D;
}
