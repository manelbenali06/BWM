import { ComponentFixture, TestBed } from '@angular/core/testing';

import { AdminProductsEditComponent } from './admin-products-edit.component';

describe('AdminProductsEditComponent', () => {
  let component: AdminProductsEditComponent;
  let fixture: ComponentFixture<AdminProductsEditComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ AdminProductsEditComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(AdminProductsEditComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
