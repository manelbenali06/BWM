import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FrecklessComponent } from './freckless.component';

describe('FrecklessComponent', () => {
  let component: FrecklessComponent;
  let fixture: ComponentFixture<FrecklessComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ FrecklessComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(FrecklessComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
