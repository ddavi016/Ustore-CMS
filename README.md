# Storage CMS

A web-based Storage Unit Management System built with PHP, MariaDB, Bootstrap and Composer.

Storage CMS provides a central platform for managing storage units, occupancy, associated documents, images, auditing, and operational reporting.

---

## Current Version

**v1.0-beta1**

Status: Beta Release

This release provides the core functionality required to manage a storage facility while additional enterprise features are under active development.

---

## Core Features

### Authentication & Security

- User authentication
- Password hashing
- Session management
- Role-ready architecture
- Protected routes via middleware

### Dashboard

- Facility overview dashboard
- Unit statistics
- Occupancy metrics
- Storage utilisation progress bar
- Quick access actions
- Facility summary information
- Recent activity feed

### Unit Management

- Create and manage storage units
- Unit status tracking
- Occupancy monitoring
- Unit editing and maintenance

### Document Management

- Upload and manage documents
- Associate documents with units
- Document storage and retrieval
- Unit-specific document management

### Image Management

- Upload images
- Associate images with units
- Image viewing and management

### Audit Logging

- Activity logging
- Unit change tracking
- Recent activity dashboard feed
- Operational accountability

### Development Roadmap Integration

- Professional Under Construction framework
- Future Development dashboard section
- Planned feature tracking

---

## Technology Stack

### Backend

- PHP 8.x
- Composer
- MariaDB / MySQL

### Frontend

- Bootstrap 5
- Font Awesome

### Infrastructure

- Apache 2
- Linux (Ubuntu)
- Git
- GitHub

---

## Project Structure

```text
storage-cms/

├── app/
│   ├── Middleware/
│   ├── Models/
│   └── Services/
│
├── bootstrap/
│
├── config/
│
├── public/
│   ├── actions/
│   ├── uploads/
│   ├── views/
│   └── index.php
│
├── vendor/
│
├── composer.json
└── README.md
```

---

## Implemented Modules

| Module | Status |
|----------|----------|
| Authentication | ✅ Complete |
| Dashboard | ✅ Complete |
| Unit Management | ✅ Complete |
| Document Management | ✅ Complete |
| Image Management | ✅ Complete |
| Audit Logging | ✅ Complete |
| Occupancy Metrics | ✅ Complete |
| Recent Activity Feed | ✅ Complete |
| Facility Summary | ✅ Complete |
| Development Roadmap | ✅ Complete |

---

## Planned Features

### Reporting Module

Planned functionality:

- Occupancy reports
- Vacancy reports
- Arrears reports
- Audit activity reports
- PDF generation
- CSV export

---

### Import / Export Centre

Future functionality:

- Bulk unit imports
- CSV import wizard
- Data validation
- Full system exports
- Scheduled exports

---

### Analytics

Planned functionality:

- Occupancy trends
- Revenue analysis
- Unit utilisation reporting
- Historical reporting
- Dashboard insights

---

### User Management

Planned functionality:

- Multiple user accounts
- Role-based permissions
- Administrator controls
- Audit accountability

---

### Backup Centre

Planned functionality:

- Manual backups
- Scheduled backups
- Database backup
- Document backup
- Restore capability

---

## Future Development Goals

### Beta 2

- Enhanced reporting
- Advanced audit tracking
- User management
- Improved dashboard widgets

### Version 1.0

- Production-ready release
- Full reporting suite
- Backup and restore
- Role-based permissions
- Operational analytics

---

## Installation

```bash
git clone <repository>
cd storage-cms

composer install
```

Configure environment settings and database connections before first use.

---

## Development Status

Storage CMS is currently in active development.

The Beta 1 release provides a stable foundation including:

- Authentication
- Dashboard
- Unit management
- Documents
- Images
- Audit logging

with additional enterprise functionality planned for future releases.

---

## Author

Damian Davies

Storage CMS Project

2026
