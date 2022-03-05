**Context**

Yii2 Crudle (CRUD logic engine) is a meta framework for rapid application development and customization using a modified (basic) template, predefined coding conventions and fully-fledged admin backend based on Semantic UI.

**Containers**

- backend   (App)
- builder   (Kit)
- modules   (Ext)

**Components**

- app
  - config
    - app
    - db
    - url
  - controllers
    - MainController
  - enums
  - helpers
  - models
  - views
    - main
  - widgets

- kit
  - config
    - kit
  - controllers
    - DataModelController
    - DataModelFieldController
  - enums
    - DataType
    - ModelType
  - helpers
  - models
    - DataModel
    - DataModelField
  - views
    - data_model
        - field
  - widgets

- ext
  
**Code**

**System Requirements**

**Domain-driven**

Use domain-driven project structure that maps to modified Yii2 modules and extensions

- Domain/
  - Actions/
  - Enums/
  - Exceptions/
  - Models/
  - Rules/
  - Status/
  - ValueObject/

**Context**
- Content (Input/Output)
- Reports (Output)
- Settings (Parameters)
- Tools

**UI Components**

- Forms
- Panel (Containers)
- Data
- Overlay
- Menu
- Charts
- Button
- File
- Multimedia
- Messages
- Miscellaneous

**Data Storage**

- Yaml  (predefined values)
- Json  (app/user data)
- Csv   (import/export)
- Md    (Page content)
- Sqlite
- Redis/MySQL

**Authentication**

- Hybrid of Php Auth Manager and Db Auth Manager
- Administrator and System roles are predefined
  
**Roadmap**
