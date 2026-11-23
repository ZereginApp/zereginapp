import { ComponentFixture, TestBed } from '@angular/core/testing';
import { CommonModule } from '@angular/common';
import { Brand } from '../brand/brand.component';
import { UserActions } from '../user-actions/user-actions.component';

import { MobileHeader } from './mobile-header.component';

describe('MobileHeader', () => {
  let component: MobileHeader;
  let fixture: ComponentFixture<MobileHeader>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [MobileHeader, Brand, UserActions],
      imports: [CommonModule],
    }).compileComponents();

    fixture = TestBed.createComponent(MobileHeader);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
